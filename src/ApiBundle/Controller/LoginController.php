<?php

namespace ApiBundle\Controller;

use ApiBundle\Services\RedisCache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotatio\Model;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function loginCheckAction() {
        $serializer = $this->get('jms_serializer');
        $redis = $this->get("redis.cache");
        $em = $this->getDoctrine()->getManager();
        $usersRepository = $em->getRepository("ApiBundle:Users");

        $usersRepository->deleteAllUsers();
        $usersRepository->saveUsers($this->container->get('security.password_encoder'));

        $this->saveUsersToRedis($redis);

        $response = array(
            'code'  => 200,
            'error' => false,
            'data'  => $redis->getUsers()
        );

        return new Response($serializer->serialize($response, 'json'));
    }

    private function saveUsersToRedis(RedisCache $redis) {
        $redis->deleteAll();
        $redis->setUsers();
    }

}
