<?php

namespace ApiBundle\Tests\Services;

use ApiBundle\Services\TokenJWT;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TokenJWTTest extends WebTestCase
{
    public function testCanBeCreateTokenFromValidUser()
    {
        $serviceTokenJWT = new TokenJWT();

        $serviceTokenJWT->setIdUser(667);
        $serviceTokenJWT->setUserName('johnsnow@gmail.com');
        $serviceTokenJWT->execute();

        $this->assertInstanceOf(
            TokenJWT::class,
            $serviceTokenJWT
        );

        $this->assertStringStartsWith('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9', $serviceTokenJWT->returnToken());
    }

    public function testCannotBeCreateTokenFromValidUser()
    {
        $serviceTokenJWT = new TokenJWT();

        $serviceTokenJWT->setIdUser(null);
        $serviceTokenJWT->setUserName('32332@_df$!€');
        $serviceTokenJWT->execute();

        $this->assertFalse($serviceTokenJWT->returnToken());

    }
}