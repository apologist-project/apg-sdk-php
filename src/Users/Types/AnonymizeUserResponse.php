<?php

namespace Apologist\Users\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Types\UserRedactResponse;
use Apologist\Core\Json\JsonProperty;

class AnonymizeUserResponse extends JsonSerializableType
{
    /**
     * @var ?UserRedactResponse $data
     */
    #[JsonProperty('data')]
    public ?UserRedactResponse $data;

    /**
     * @param array{
     *   data?: ?UserRedactResponse,
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
