<?php

namespace ApologistAi\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;

class ChatMessage extends JsonSerializableType
{
    /**
     * @var ?value-of<ChatMessageRole> $role
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @var ?string $content
     */
    #[JsonProperty('content')]
    public ?string $content;

    /**
     * @param array{
     *   role?: ?value-of<ChatMessageRole>,
     *   content?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->role = $values['role'] ?? null;
        $this->content = $values['content'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
