<?php

namespace Apologist\Evaluators\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Core\Types\ArrayType;

class EvaluateContentResponse extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $result
     */
    #[JsonProperty('result'), ArrayType(['string' => 'mixed'])]
    public ?array $result;

    /**
     * @param array{
     *   result?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->result = $values['result'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
