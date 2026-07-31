<?php

namespace ApologistAi\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;
use ApologistAi\Core\Types\ArrayType;

class User extends JsonSerializableType
{
    /**
     * @var ?string $id Internal user id (UUID).
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $externalId
     */
    #[JsonProperty('external_id')]
    public ?string $externalId;

    /**
     * @var ?int $teamId
     */
    #[JsonProperty('team_id')]
    public ?int $teamId;

    /**
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    public ?string $createdAt;

    /**
     * @var ?string $migratedAt
     */
    #[JsonProperty('migrated_at')]
    public ?string $migratedAt;

    /**
     * @var ?string $migratedToUserId
     */
    #[JsonProperty('migrated_to_user_id')]
    public ?string $migratedToUserId;

    /**
     * @var ?array<TagRef> $tags
     */
    #[JsonProperty('tags'), ArrayType([TagRef::class])]
    public ?array $tags;

    /**
     * @var ?int $responderId
     */
    #[JsonProperty('responder_id')]
    public ?int $responderId;

    /**
     * @param array{
     *   id?: ?string,
     *   externalId?: ?string,
     *   teamId?: ?int,
     *   createdAt?: ?string,
     *   migratedAt?: ?string,
     *   migratedToUserId?: ?string,
     *   tags?: ?array<TagRef>,
     *   responderId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->teamId = $values['teamId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->migratedAt = $values['migratedAt'] ?? null;
        $this->migratedToUserId = $values['migratedToUserId'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->responderId = $values['responderId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
