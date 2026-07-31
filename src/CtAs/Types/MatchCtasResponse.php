<?php

namespace ApologistAi\CtAs\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;
use ApologistAi\Core\Types\ArrayType;

class MatchCtasResponse extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $ctas
     */
    #[JsonProperty('ctas'), ArrayType([['string' => 'mixed']])]
    public ?array $ctas;

    /**
     * @param array{
     *   ctas?: ?array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->ctas = $values['ctas'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
