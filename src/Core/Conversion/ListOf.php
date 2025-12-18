<?php

declare(strict_types=1);

namespace Apologist\Core\Conversion;

use Apologist\Core\Conversion\Concerns\ArrayOf;
use Apologist\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    // @phpstan-ignore-next-line missingType.iterableValue
    private function empty(): array|object
    {
        return [];
    }
}
