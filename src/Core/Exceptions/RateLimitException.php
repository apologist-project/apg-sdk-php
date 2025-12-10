<?php

namespace Apologist\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Apologist Rate Limit Exception';
}
