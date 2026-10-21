<?php

namespace Apologist\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

class ChatwootConversationMeta extends JsonSerializableType
{
    /**
     * @var ?string $assigneeType `AgentBot` while the Agent owns the thread. `User` after staff take over.
     */
    #[JsonProperty('assignee_type')]
    public ?string $assigneeType;

    /**
     * @var ?ChatwootConversationMetaSender $sender
     */
    #[JsonProperty('sender')]
    public ?ChatwootConversationMetaSender $sender;

    /**
     * @param array{
     *   assigneeType?: ?string,
     *   sender?: ?ChatwootConversationMetaSender,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->assigneeType = $values['assigneeType'] ?? null;
        $this->sender = $values['sender'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
