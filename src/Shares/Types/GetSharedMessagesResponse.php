<?php

namespace ApologistAi\Shares\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;
use ApologistAi\Core\Types\ArrayType;

class GetSharedMessagesResponse extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $messages
     */
    #[JsonProperty('messages'), ArrayType([['string' => 'mixed']])]
    public ?array $messages;

    /**
     * @param array{
     *   messages?: ?array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->messages = $values['messages'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
