<?php

namespace Apologist\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Apologist Bad Request Exception';
}
