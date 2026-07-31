<?php

namespace Apologist\Evaluators\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Core\Types\ArrayType;

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
