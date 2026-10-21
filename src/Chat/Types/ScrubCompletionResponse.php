<?php

namespace Apologist\Chat\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Types\CompletionRedactResponse;
use Apologist\Core\Json\JsonProperty;

class ScrubCompletionResponse extends JsonSerializableType
{
    /**
     * @var ?CompletionRedactResponse $data
     */
    #[JsonProperty('data')]
    public ?CompletionRedactResponse $data;

    /**
     * @param array{
     *   data?: ?CompletionRedactResponse,
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
