<?php

namespace Apologist\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Apologist Internal Server Exception';
}
