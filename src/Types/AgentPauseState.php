<?php

namespace Apologist\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

/**
 * Agent-wide pause or resume result, including fan-out counts.
 */
class AgentPauseState extends JsonSerializableType
{
    /**
     * @var ?bool $isPaused
     */
    #[JsonProperty('is_paused')]
    public ?bool $isPaused;

    /**
     * @var ?string $pausedAt
     */
    #[JsonProperty('paused_at')]
    public ?string $pausedAt;

    /**
     * @var ?string $resumedAt
     */
    #[JsonProperty('resumed_at')]
    public ?string $resumedAt;

    /**
     * @var ?int $emitted Conversations that received a transition message.
     */
    #[JsonProperty('emitted')]
    public ?int $emitted;

    /**
     * @var ?int $skipped Conversations skipped during fan-out.
     */
    #[JsonProperty('skipped')]
    public ?int $skipped;

    /**
     * @param array{
     *   isPaused?: ?bool,
     *   pausedAt?: ?string,
     *   resumedAt?: ?string,
     *   emitted?: ?int,
     *   skipped?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->isPaused = $values['isPaused'] ?? null;
        $this->pausedAt = $values['pausedAt'] ?? null;
        $this->resumedAt = $values['resumedAt'] ?? null;
        $this->emitted = $values['emitted'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
