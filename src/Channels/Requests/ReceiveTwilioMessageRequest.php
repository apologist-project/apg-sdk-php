<?php

namespace Apologist\Channels\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

class ReceiveTwilioMessageRequest extends JsonSerializableType
{
    /**
     * @var ?string $from
     */
    #[JsonProperty('From')]
    public ?string $from;

    /**
     * @var ?string $body
     */
    #[JsonProperty('Body')]
    public ?string $body;

    /**
     * @param array{
     *   from?: ?string,
     *   body?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->from = $values['from'] ?? null;
        $this->body = $values['body'] ?? null;
    }
}
