<?php

namespace ApiBundle\UseCase;


use ApiBundle\Entity\Users;
use ApiBundle\Entity\UsersRepository;
use ApiBundle\Services\TokenJWT;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

/**
 * Use case for change Password of user
 *
 * Class ChangePasswordUseCase
 * @package ApiBundle\UseCase
 */
class ChangePasswordUseCase
{
    const _ERROR_PASSWORD = 'Error changing password';
    const _ERROR_USER_CANT_LOGIN = 'Error with login';

    private $usersRepository;
    private $encoder;
    private $userObject;
    private $userEntity;

    public function __construct(
        $userName,
        $userPassword,
        UsersRepository
        $usersRepository,
        UserPasswordEncoder $encoder
    ) {
        $this->userObject = new \stdClass();
        $this->userObject->name = $userName;
        $this->userObject->password = $userPassword;
        $this->usersRepository = $usersRepository;
        $this->encoder = $encoder;
    }

    /**
     * Will check if the user logged well and his credentials are ok, if not will return an error and exit
     */
    public function setLogin() {
        $userCheckCredentials = $this->usersRepository->checkCredentials(
            $this->encoder,
            $this->userObject
        );
        $this->userEntity = new Users();

        if (isset($userCheckCredentials['idUser'])) {
            $this->userEntity->setId($userCheckCredentials['idUser']);
            $this->userEntity->setName($this->userObject->name);
            $this->userEntity->setPassword($this->userObject->password);
        } else {
            $this->userEntity->setId(false);
            echo self::_ERROR_USER_CANT_LOGIN;
            $this->callExit();
        }
    }

    /**
     * Needed to change the password of the user, will verify if the oldPassword is the same of
     * his current password, and newPassword is not empty
     *
     * @param $oldPassword
     * @param $newPassword
     *
     * @return bool
     */
    public function checkPassword($oldPassword, $newPassword) {
        if ($oldPassword != $this->userEntity->getPassword() || empty($oldPassword) ||
            is_null($this->userEntity->getPassword()) || empty($newPassword)
        ) {
            echo self::_ERROR_PASSWORD;
            $this->callExit();
        }

        return true;
    }

    /**
     * If the setLogin is ok and checkPassword return true, will verify if the jwt token of the user is ok, in case
     * that token is ok will be processed to change the password if not will return false
     *
     * @param $tokenJwt
     * @param $newPassword
     *
     * @return bool
     */
    public function processChangePassword($tokenJwt, $newPassword) {
        $tokenJwtService = new TokenJWT();

        if ($tokenJwtService->verifiyToken($tokenJwt)) {
            $data = $tokenJwtService->getPayloadFromToken($tokenJwt);
            return $this->saveNewPassword($data->user_id, $newPassword);
        }

        return false;
    }

    public function saveNewPassword($userId, $newPassword) {
        if (!empty($userId) && !empty($newPassword)) {
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getUserName() {
        return $this->userObject->name;
    }

    /**
     * @return mixed
     */
    public function getUserPassword() {
        return $this->userObject->password;
    }


    protected function callExit() {
        exit;
    }
}
