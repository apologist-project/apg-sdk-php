<?php

namespace Apologist\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Apologist Conflict Exception';
}
