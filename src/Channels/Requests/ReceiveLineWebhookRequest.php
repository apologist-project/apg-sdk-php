<?php

namespace Apologist\Channels\Requests;

use Apologist\Core\Json\JsonSerializableType;

class ReceiveLineWebhookRequest extends JsonSerializableType
{
    /**
     * @var ?string $lineSignature Base64-encoded HMAC-SHA256 of the raw body keyed with the LINE channel secret. Required when the webhook URL does not include an api_key.
     */
    public ?string $lineSignature;

    /**
     * @var array<string, mixed> $body LINE webhook payload (`destination` + `events`).
     */
    public array $body;

    /**
     * @param array{
     *   body: array<string, mixed>,
     *   lineSignature?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->lineSignature = $values['lineSignature'] ?? null;
        $this->body = $values['body'];
    }
}
