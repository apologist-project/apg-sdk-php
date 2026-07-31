<?php

namespace Apologist\Users\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Types\User;
use Apologist\Core\Json\JsonProperty;

class UpdateUserResponse extends JsonSerializableType
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
