<?php

namespace ApologistAi\Evaluators\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;
use ApologistAi\Core\Types\ArrayType;

class GetEvaluationResponse extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $data
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public ?array $data;

    /**
     * @param array{
     *   data?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
