<?php

namespace Apologist\Channels\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

class ChatwootWebhookPayloadAccount extends JsonSerializableType
{
    /**
     * @var ?int $id Must match the channel Account ID, or the request is rejected.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @param array{
     *   id?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
