<?php

namespace ApologistAi\Users\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Types\User;
use ApologistAi\Core\Json\JsonProperty;

class GetUserResponse extends JsonSerializableType
{
    /**
     * @var ?User $data
     */
    #[JsonProperty('data')]
    public ?User $data;

    /**
     * @param array{
     *   data?: ?User,
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
