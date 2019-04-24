<?php
namespace ApiBundle\Services;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

/**
 * Used to encrypt a value with sha1 hash
 *
 * Class PassEncoder
 * @package ApiBundle\Services
 */
class PassEncoder implements PasswordEncoderInterface{

    public function encodePassword($raw, $salt)
    {
        return hash('sha1', $salt . $raw);
    }

    public function isPasswordValid($encoded, $raw, $salt)
    {
        return $encoded === $this->encodePassword($raw, $salt);
    }
}
