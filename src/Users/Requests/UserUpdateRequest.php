<?php

namespace Apologist\Users\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Core\Types\ArrayType;
use Apologist\Core\Types\Union;

class UserUpdateRequest extends JsonSerializableType
{
    /**
     * @var ?string $externalId Your external identifier for the user.
     */
    #[JsonProperty('external_id')]
    public ?string $externalId;

    /**
     * @var ?array<(
     *    string
     *   |int
     * )> $tags Applied tags as a mix of existing tag ids and/or default-language tag names. Unknown ids or names are rejected. Tags are mirror-owned and never created here.
     */
    #[JsonProperty('tags'), ArrayType([new Union('string', 'integer')])]
    public ?array $tags;

    /**
     * @var ?int $responderId Responder to persist for this user on the requesting agent. Must be active on the agent.
     */
    #[JsonProperty('responder_id')]
    public ?int $responderId;

    /**
     * @param array{
     *   externalId?: ?string,
     *   tags?: ?array<(
     *    string
     *   |int
     * )>,
     *   responderId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->externalId = $values['externalId'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->responderId = $values['responderId'] ?? null;
    }
}
