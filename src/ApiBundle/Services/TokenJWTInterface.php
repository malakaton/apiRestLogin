<?php

namespace ApiBundle\Services;

interface TokenJWTInterface
{
    public function returnToken();
    public function execute($idUser);
}
