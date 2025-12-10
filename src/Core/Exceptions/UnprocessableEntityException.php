<?php

namespace Apologist\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Apologist Unprocessable Entity Exception';
}
