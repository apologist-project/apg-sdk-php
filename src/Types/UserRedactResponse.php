<?php

namespace Apologist\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

/**
 * Result of scrubbing or anonymizing a user's message-adjacent text. Rows and identifiers are kept.
 */
class UserRedactResponse extends JsonSerializableType
{
    /**
     * @var ?string $id Internal user id (UUID).
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?value-of<UserRedactResponseMode> $mode
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @var ?string $redactRequestedAt When the erase request was stamped. The hourly cron finishes leftover rows.
     */
    #[JsonProperty('redact_requested_at')]
    public ?string $redactRequestedAt;

    /**
     * @var ?int $messagesRedacted Message rows rewritten in this request.
     */
    #[JsonProperty('messages_redacted')]
    public ?int $messagesRedacted;

    /**
     * @var ?int $remaining Message rows still waiting. Zero means this request finished the user.
     */
    #[JsonProperty('remaining')]
    public ?int $remaining;

    /**
     * @param array{
     *   id?: ?string,
     *   mode?: ?value-of<UserRedactResponseMode>,
     *   redactRequestedAt?: ?string,
     *   messagesRedacted?: ?int,
     *   remaining?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->mode = $values['mode'] ?? null;
        $this->redactRequestedAt = $values['redactRequestedAt'] ?? null;
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
