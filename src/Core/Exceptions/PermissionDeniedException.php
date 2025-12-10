<?php

namespace Apologist\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Apologist Permission Denied Exception';
}
