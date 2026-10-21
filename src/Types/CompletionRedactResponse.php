<?php

namespace Apologist\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

/**
 * Result of scrubbing or anonymizing a chat completion's message-adjacent text. Rows and identifiers are kept.
 */
class CompletionRedactResponse extends JsonSerializableType
{
    /**
     * @var ?string $id Chat completion id (UUID).
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?value-of<CompletionRedactResponseMode> $mode
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @var ?int $messagesRedacted Message rows rewritten in this request.
     */
    #[JsonProperty('messages_redacted')]
    public ?int $messagesRedacted;

    /**
     * @var ?int $remaining Message rows still waiting. Zero means this request finished the completion.
     */
    #[JsonProperty('remaining')]
    public ?int $remaining;

    /**
     * @param array{
     *   id?: ?string,
     *   mode?: ?value-of<CompletionRedactResponseMode>,
     *   messagesRedacted?: ?int,
     *   remaining?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->mode = $values['mode'] ?? null;
        $this->messagesRedacted = $values['messagesRedacted'] ?? null;
        $this->remaining = $values['remaining'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
