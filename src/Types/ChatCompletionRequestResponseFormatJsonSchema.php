<?php

namespace ApologistAi\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;
use ApologistAi\Core\Types\ArrayType;

/**
 * Required when type is json_schema. Supplies the JSON Schema the structured output must conform to. Structured outputs are non-streaming.
 */
class ChatCompletionRequestResponseFormatJsonSchema extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?array<string, mixed> $schema
     */
    #[JsonProperty('schema'), ArrayType(['string' => 'mixed'])]
    public ?array $schema;

    /**
     * @var ?bool $strict
     */
    #[JsonProperty('strict')]
    public ?bool $strict;

    /**
     * @param array{
     *   name?: ?string,
     *   description?: ?string,
     *   schema?: ?array<string, mixed>,
     *   strict?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->schema = $values['schema'] ?? null;
        $this->strict = $values['strict'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
