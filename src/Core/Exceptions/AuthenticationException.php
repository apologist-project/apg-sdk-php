<?php

namespace Apologist\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Apologist Authentication Exception';
}
