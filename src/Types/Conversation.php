<?php

namespace Apologist\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Core\Types\ArrayType;

/**
 * A conversation scoped to the requesting agent.
 */
class Conversation extends JsonSerializableType
{
    /**
     * @var ?string $id Internal conversation id (UUID).
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $externalId Team-scoped external conversation id.
     */
    #[JsonProperty('external_id')]
    public ?string $externalId;

    /**
     * @var ?int $agentId
     */
    #[JsonProperty('agent_id')]
    public ?int $agentId;

    /**
     * @var ?int $teamId
     */
    #[JsonProperty('team_id')]
    public ?int $teamId;

    /**
     * @var ?array<string, mixed> $tags
     */
    #[JsonProperty('tags'), ArrayType(['string' => 'mixed'])]
    public ?array $tags;

    /**
     * @var ?string $startedAt
     */
    #[JsonProperty('started_at')]
    public ?string $startedAt;

    /**
     * @var ?string $endedAt
     */
    #[JsonProperty('ended_at')]
    public ?string $endedAt;

    /**
     * @var ?bool $agentPaused
     */
    #[JsonProperty('agent_paused')]
    public ?bool $agentPaused;

    /**
     * @var ?string $agentPausedAt
     */
    #[JsonProperty('agent_paused_at')]
    public ?string $agentPausedAt;

    /**
     * @var ?string $agentResumedAt
     */
    #[JsonProperty('agent_resumed_at')]
    public ?string $agentResumedAt;

    /**
     * @param array{
     *   id?: ?string,
     *   externalId?: ?string,
     *   agentId?: ?int,
     *   teamId?: ?int,
     *   tags?: ?array<string, mixed>,
     *   startedAt?: ?string,
     *   endedAt?: ?string,
     *   agentPaused?: ?bool,
     *   agentPausedAt?: ?string,
     *   agentResumedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->agentId = $values['agentId'] ?? null;
        $this->teamId = $values['teamId'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->startedAt = $values['startedAt'] ?? null;
        $this->endedAt = $values['endedAt'] ?? null;
        $this->agentPaused = $values['agentPaused'] ?? null;
        $this->agentPausedAt = $values['agentPausedAt'] ?? null;
        $this->agentResumedAt = $values['agentResumedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
