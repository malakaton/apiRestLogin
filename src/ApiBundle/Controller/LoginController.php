<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\UsersRepository;
use ApiBundle\Services\RedisCache;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    /**
     * @Rest\Get("/Users")
     * @Rest\View
     *
     * @ApiDoc(
     *   section="users",
     *   description="Verify the user list persistent in memory have the correct credentials, if the credentails are ok, will return a jwt token for every user",
     *   statusCodes={
     *     200="Returned when successful, will return an array with iduser and his jwt token",
     *     401="User is empty",
     *     402="Password is empty",
     *     403="User name doesnt exist",
     *     404="User credentials not found"
     *   }
     * )
     *
     * @return mixed
     */
    public function loginCheckAction() {
        $serializer = $this->get('jms_serializer');
        $redis = $this->get("redis.cache");
        $em = $this->getDoctrine()->getManager();
        $usersRepository = $em->getRepository("ApiBundle:Users");

        /**
         * This is for test, delete all users entity and save the same users are hard code in the users repository
         */
        $usersRepository->deleteAllUsers();
        $usersRepository->saveUsers($this->container->get('security.password_encoder'));

        /**
         * This is for test, will save to redis memory a hard code users in the RedisCache Model,
         * its needed to check if our api works right
         */
        $this->saveUsersToRedis($redis);

        return new Response(
            $serializer->serialize(
                $this->setTokenForUsers($redis->getUsers(), $usersRepository),
                'json'
            )
        );
    }

    /**
     * Save users list in redis cache
     *
     * @param RedisCache $redis
     */
    private function saveUsersToRedis(RedisCache $redis) {
        $redis->deleteAll();
        $redis->setUsers();
    }

    /**
     *
     * Will receive an array of users, for every user will be check if credentials are ok (username and password)
     * If the credentials are ok will be return a token jwt to authorize the user to login, if not
     * will be return the error code and error message to inform at the api the problem appeared. When
     * loop of the array user finished will be return an array of response to the api call loginCheck
     *
     * @param                 $users
     * @param UsersRepository $usersRepository
     *
     * @return array
     */
    private function setTokenForUsers($users, UsersRepository $usersRepository) {
        $responseApi = array();
        $message = null;
        $userToken = null;
        $tokenService = $this->get('api.token');

        foreach ($users as $user) {
            $responseUser = $usersRepository->checkCredentials(
                $this->container->get('security.password_encoder'),
                json_decode($user)
            );
            if (isset($responseUser['idUser'])) {
                $tokenService->setIdUser($responseUser['idUser']);
                $tokenService->setUserName($responseUser['userName']);
                $tokenService->execute();

                $code = UsersRepository::_RESPONSE_CODE_OK;
                $error = false;
                $userToken = array(
                    'id_user' => $responseUser['idUser'],
                    'token_user' => $tokenService->returnToken()
                );
            } else {
                $code = $responseUser['errorCode'];
                $error = true;
                $message = $responseUser['message'];
            }

            $response = array(
                'code'  => $code,
                'error' => $error,
                'data'  => $code === UsersRepository::_RESPONSE_CODE_OK ? $userToken : $message
            );
            array_push($responseApi, $response);
        }

        return $responseApi;
    }

}
