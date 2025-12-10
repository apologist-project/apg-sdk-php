<?php

namespace Apologist\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Apologist Not Found Exception';
}
