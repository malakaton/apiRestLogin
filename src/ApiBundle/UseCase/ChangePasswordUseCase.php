<?php

namespace ApiBundle\UseCase;


use ApiBundle\Entity\Users;
use ApiBundle\Entity\UsersRepository;
use ApiBundle\Services\TokenJWT;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

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

    public function checkPassword($oldPassword, $newPassword) {
        if ($oldPassword != $this->userEntity->getPassword() || empty($oldPassword) ||
            is_null($this->userEntity->getPassword()) || empty($newPassword)
        ) {
            echo self::_ERROR_PASSWORD;
            $this->callExit();
        }

        return true;
    }

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

    public function getUserName() {
        return $this->userObject->name;
    }

    public function getUserPassword() {
        return $this->userObject->password;
    }

    protected function callExit() {
        exit;
    }
}
