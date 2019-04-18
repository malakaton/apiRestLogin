<?php

namespace Libs;

use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Use for custom Exception
 */

class CustomExceptions extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
