<?php

declare(strict_types=1);

namespace Apologist\Core\Conversion\Contracts;

use Apologist\Core\Conversion\CoerceState;
use Apologist\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
