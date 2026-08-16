<?php

namespace Apologist\Conversations\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Types\Conversation;
use Apologist\Core\Json\JsonProperty;

class ResumeConversationResponse extends JsonSerializableType
{
    /**
     * @var ?Conversation $data
     */
    #[JsonProperty('data')]
    public ?Conversation $data;

    /**
     * @param array{
     *   data?: ?Conversation,
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
