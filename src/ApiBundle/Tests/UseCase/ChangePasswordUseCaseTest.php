<?php

namespace ApiBundle\Tests\UseCase;

use ApiBundle\UseCase\ChangePasswordUseCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChangePasswordUseCaseTest extends WebTestCase
{
    const _USER_NEW_PASSWORD = 'newP4wD123';
    const _USER_NAME = 'johnsnow@gmail.com';
    const _USER_PASSWORD = 'yT3u6';
    const _USER_BAD_PASSWORD = 'b4DP4wD';
    const _USER_JWT_TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjo2MSwidXNlcl9uYW1lIjoiam9obnNub3dAZ21haWwuY29tIiwiZXhwIjoxNTU2MDcyMDQxfQ.lYOGVohmEkugH6t7yA3MS7q-FtYRdqM0RCJHtNoX9_8';

    private $container;
    private $em;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->container = static::$kernel->getContainer();
        $this->em = static::$kernel->getContainer()->get('doctrine')->getManager();
    }

    public function testChangePasswordWhenUserNotPutNewPassword() {
        /**
         * Creamos un objeto mock del caso de uso que
         * contiene el metodo changePassword que nos permitirá
         * modificar el password de un usuario logeado
         */
        $changePasswordMock = $this->getMockBuilder("ApiBundle\UseCase\ChangePasswordUseCase")
            ->setConstructorArgs(
                array(
                    self::_USER_NAME,
                    self::_USER_PASSWORD,
                    $this->em->getRepository("ApiBundle:Users"),
                    $this->container->get('security.password_encoder')
                )
            )
            ->setMethods(array('callExit'))
            ->getMock();

        $changePasswordMock->expects($this->once())
            ->method('callExit');

        $this->expectOutputString(ChangePasswordUseCase::_ERROR_PASSWORD);

        $changePasswordMock->setLogin();
        $changePasswordMock->checkPassword(self::_USER_PASSWORD, null);
    }

    public function testChangePasswordWhenUserPutBadOldPassword() {
        /**
         * Creamos un objeto mock del caso de uso que
         * contiene el metodo changePassword que nos permitirá
         * modificar el password de un usuario logeado
         */
        $changePasswordMock = $this->getMockBuilder("ApiBundle\UseCase\ChangePasswordUseCase")
            ->setConstructorArgs(
                array(
                    self::_USER_NAME,
                    self::_USER_PASSWORD,
                    $this->em->getRepository("ApiBundle:Users"),
                    $this->container->get('security.password_encoder')
                )
            )
            ->setMethods(array('callExit'))
            ->getMock();

        $changePasswordMock->expects($this->once())
            ->method('callExit');

        $this->expectOutputString(ChangePasswordUseCase::_ERROR_PASSWORD);

        $changePasswordMock->setLogin();
        $changePasswordMock->checkPassword(self::_USER_BAD_PASSWORD, self::_USER_NEW_PASSWORD);
    }

    public function testChangePasswordWhenUserPutBadCredentials() {
        /**
         * Creamos un objeto mock del caso de uso que
         * contiene el metodo changePassword que nos permitirá
         * modificar el password de un usuario logeado
         */
        $changePasswordMock = $this->getMockBuilder("ApiBundle\UseCase\ChangePasswordUseCase")
            ->setConstructorArgs(
                array(
                    self::_USER_NAME,
                    self::_USER_BAD_PASSWORD,
                    $this->em->getRepository("ApiBundle:Users"),
                    $this->container->get('security.password_encoder')
                )
            )
            ->setMethods(array('callExit'))
            ->getMock();

        $changePasswordMock->expects($this->once())
            ->method('callExit');

        $this->expectOutputString(ChangePasswordUseCase::_ERROR_USER_CANT_LOGIN);

        $changePasswordMock->setLogin();
    }

    public function testChangePasswordBadConstructor() {
        /**
         * Creamos un objeto mock del caso de uso que
         * contiene el metodo changePassword que nos permitirá
         * modificar el password de un usuario logeado
         */
        $changePasswordMock = $this->getMockBuilder("ApiBundle\UseCase\ChangePasswordUseCase")
            ->setMethods(array('__construct'))
            ->setConstructorArgs(
                array(
                    self::_USER_NAME,
                    self::_USER_BAD_PASSWORD,
                    $this->em->getRepository("ApiBundle:Users"),
                    $this->container->get('security.password_encoder')
                )
            )
            ->disableOriginalConstructor()
            ->getMock();

        $userName = isset($changePasswordMock->userObject->name) ? $changePasswordMock->userObject->name : null;
        $expectedUserName = self::_USER_NAME;

        $this->assertNotEquals(
            $expectedUserName,
            $userName
        );
    }

    public function testChangePasswordReturnExpectedUserNameAndPassword() {
        /**
         * Creamos un objeto mock del caso de uso que
         * contiene el metodo changePassword que nos permitirá
         * modificar el password de un usuario logeado
         */
        $changePasswordMock = $this->getMockBuilder("ApiBundle\UseCase\ChangePasswordUseCase")
            ->setMethods(array('__construct'))
            ->setConstructorArgs(
                array(
                    self::_USER_NAME,
                    self::_USER_PASSWORD,
                    $this->em->getRepository("ApiBundle:Users"),
                    $this->container->get('security.password_encoder')
                )
            )
            ->getMock();

        $this->assertEquals(
            self::_USER_NAME,
            $changePasswordMock->getUserName()
        );

        $this->assertEquals(
            self::_USER_PASSWORD,
            $changePasswordMock->getUserPassword()
        );
    }

    public function testChangePasswordReturnTrueSuccessfulLogin() {
        $changePasswordUseCase = new ChangePasswordUseCase(
            self::_USER_NAME,
            self::_USER_PASSWORD,
            $this->em->getRepository("ApiBundle:Users"),
            $this->container->get('security.password_encoder')
        );

        $result = $changePasswordUseCase->processChangePassword(
            self::_USER_JWT_TOKEN,
            self::_USER_NEW_PASSWORD
        );

        $this->assertTrue($result);
    }
}
