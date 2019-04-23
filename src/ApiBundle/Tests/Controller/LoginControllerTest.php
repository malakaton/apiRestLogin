<?php

namespace ApiBundle\Tests\Controller;

use ApiBundle\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginControllerTest extends WebTestCase
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

    public function testUsersEntity() {
        $users = new Users();
        $users->setName('johnsnow@gmail.com');
        $users->setPassword('yT3u6');

        $this->assertEquals('johnsnow@gmail.com', $users->getName());
        $this->assertEquals('yT3u6', $users->getPassword());
    }

    public function testEncodeUserPassword() {
        self::bootKernel();
        $encoder = $this->container->get('security.password_encoder');
        $users = new Users();

        $users->setName('johnsnow@gmail.com');
        $users->setPassword('yT3u6');

        $this->assertEquals(
            $encoder->encodePassword($users, $users->getPassword()),
            '6ddf1e3247711e8143ea0d0c117db4ec126257fa'
        );
    }
}
