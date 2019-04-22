<?php

namespace ApiBundle\Services;

interface TokenJWTInterface
{
    public function returnToken();
    public function setIdUser($idUser);
    public function setUserName($userName);
    public function execute();
}
