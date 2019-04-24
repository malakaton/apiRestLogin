<?php

namespace ApiBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use ApiBundle\Entity\Users;

class UsersRepositoryTest extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->em = static::$kernel->getContainer()->get('doctrine')->getManager();
    }

    /**
     * Verify if the username and password writed in the test are ok and the method checkCredentials works fine
     * and return an array with attributes idUser and userName if the credentials are ok
     */
    public function testCheckCredentials()
    {
        $userData = new \stdClass();
        $userData->name = "johnsnow@gmail.com";
        $userData->password = "yT3u6";

        $usersRepository = $this->em->getRepository(Users::class);
        $user = $usersRepository->checkCredentials(
            static::$kernel->getContainer()->get('security.password_encoder'),
            $userData
        );

        $this->assertArrayHasKey('idUser', $user);
        $this->assertArrayHasKey('userName', $user);
    }

    /**
     * Verify that checkCredentials will return an array with attributes message and errorCode when the method
     * checkCredentials fails because the credentials are bad
     */
    public function testFailCredentials()
    {
        $userData = new \stdClass();
        $userData->name = "johnsnow@gmail.com";
        $userData->password = "B4dPwd";

        $usersRepository = $this->em->getRepository(Users::class);
        $user = $usersRepository->checkCredentials(
            static::$kernel->getContainer()->get('security.password_encoder'),
            $userData
        );

        $this->assertArrayHasKey('message', $user);
        $this->assertArrayHasKey('errorCode', $user);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
}
