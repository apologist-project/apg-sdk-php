<?php

namespace Apologist\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

/**
 * A team-level user flag definition from the user_flags table.
 */
class UserFlag extends JsonSerializableType
{
    /**
     * @var ?int $id
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $userId Upstream owning user id when present (mirrored from Ignite).
     */
    #[JsonProperty('user_id')]
    public ?int $userId;

    /**
     * @var ?int $teamId
     */
    #[JsonProperty('team_id')]
    public ?int $teamId;

    /**
     * @var ?string $syncedAt
     */
    #[JsonProperty('synced_at')]
    public ?string $syncedAt;

    /**
     * @param array{
     *   id?: ?int,
     *   name?: ?string,
     *   userId?: ?int,
     *   teamId?: ?int,
     *   syncedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->userId = $values['userId'] ?? null;
        $this->teamId = $values['teamId'] ?? null;
        $this->syncedAt = $values['syncedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
