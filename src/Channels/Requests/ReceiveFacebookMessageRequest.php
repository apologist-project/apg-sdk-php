<?php

namespace Apologist\Channels\Requests;

use Apologist\Core\Json\JsonSerializableType;

class ReceiveFacebookMessageRequest extends JsonSerializableType
{
    /**
     * @var array<string, mixed> $body Meta webhook payload.
     */
    public array $body;

    /**
     * @param array{
     *   body: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
