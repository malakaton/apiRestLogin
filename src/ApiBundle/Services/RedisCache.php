<?php
namespace ApiBundle\Services;

use Predis\Client as Redis;

class RedisCache {

    CONST _USERS_KEYS = "users";

    private $redis;

    public function __construct(Redis $redis) {
        $this->redis = $redis;
    }

    public function setUsers() {
        $userList = array(
            array(
                "name" => "johnsnow@gmail.com",
                "password" => "yT3u6",
            ),
            array(
                "name" => "davidgoliat@gmail.com",
                "password" => "b4dP4wD"
            ),
            array(
                "name" => "praisethesun@darksouls.com",
                "password" => "b4dP4wD"
            ),
            array(
                "name" => null,
                "password" => "ui5345Po"
            ),
            array(
                "name" => "dark_knight1@yahoo.com",
                "password" => "Pdf34dvD"
            ),
            array(
                "name" => "gitgud@gmail.com",
                "password" => null
            )
        );

        foreach ($userList as $user) {
            $this->redis->sadd(
                self::_USERS_KEYS,
                json_encode($user)
            );
        }
    }

    public function getUsers() {
        return $this->redis->smembers(self::_USERS_KEYS);
    }

    public function deleteAll() {
        $this->redis->flushall();
    }
}
