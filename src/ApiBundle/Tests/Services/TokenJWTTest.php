<?php

namespace ApiBundle\Tests\Services;

use ApiBundle\Services\TokenJWT;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TokenJWTTest extends WebTestCase
{
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->container = static::$kernel->getContainer();
    }

    /**
     * Verify if the tokenJWT class works fine encoding the header of token
     */
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

    /**
     * Verify if the tokenJWT class return false when is not possible to create a token if the idUser or userName
     * passed like parameters in set methods are null
     */
    public function testCannotBeCreateTokenFromValidUser()
    {
        $serviceTokenJWT = new TokenJWT();

        $serviceTokenJWT->setIdUser(null);
        $serviceTokenJWT->setUserName('32332@_df$!€');
        $serviceTokenJWT->execute();

        $this->assertFalse($serviceTokenJWT->returnToken());

    }

    /**
     * Verify if the token passed in the test is ok an will return true by method verifyToken of TokenJWT class
     */
    public function testVerifyToken()
    {
        $tokenJwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjo2MSwidXNlcl9uYW1lIjoiam9obnNub3dAZ21haWwuY29tIiwiZXhwIjoxNTU2MDcyMDQxfQ.lYOGVohmEkugH6t7yA3MS7q-FtYRdqM0RCJHtNoX9_8';
        $serviceTokenJWT = new TokenJWT();

        $this->assertTrue($serviceTokenJWT->verifiyToken($tokenJwt));
    }
}