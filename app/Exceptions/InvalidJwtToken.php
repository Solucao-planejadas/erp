<?php

namespace App\Exceptions;

use Exception;

class InvalidJwtToken extends Exception
{
    public function __construct(int $code = 403, ?Throwable $previous = null)
    {
        parent::__construct('Invalid JWT token!', $code, $previous);
    }
}
