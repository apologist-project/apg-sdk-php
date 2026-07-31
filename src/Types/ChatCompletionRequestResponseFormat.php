<?php

namespace Apologist\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

class ChatCompletionRequestResponseFormat extends JsonSerializableType
{
    /**
     * @var ?value-of<ChatCompletionRequestResponseFormatType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?ChatCompletionRequestResponseFormatJsonSchema $jsonSchema Required when type is json_schema. Supplies the JSON Schema the structured output must conform to. Structured outputs are non-streaming.
     */
    #[JsonProperty('json_schema')]
    public ?ChatCompletionRequestResponseFormatJsonSchema $jsonSchema;

    /**
     * @param array{
     *   type?: ?value-of<ChatCompletionRequestResponseFormatType>,
     *   jsonSchema?: ?ChatCompletionRequestResponseFormatJsonSchema,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->jsonSchema = $values['jsonSchema'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
