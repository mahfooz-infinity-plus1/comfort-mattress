<?php

namespace App\Exceptions;

use Exception;

class ImportException extends Exception
{
    public function __construct(
        $message,
        $code = 0,
        Exception $previous = null,
        $options = array('params')
    ) {
        parent::__construct($message, $code, $previous);

        $this->_options = $options;
    }

    public function getOptions()
    {
        return $this->_options;
    }
}
