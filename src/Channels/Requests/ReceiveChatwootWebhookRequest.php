<?php

namespace Apologist\Channels\Requests;

use Apologist\Core\Json\JsonSerializableType;

class ReceiveChatwootWebhookRequest extends JsonSerializableType
{
    /**
     * @var ?string $chatwootSignature `sha256=` plus hex HMAC-SHA256 of `{timestamp}.{rawBody}` keyed with the Agent Bot webhook secret. Required when the webhook URL does not include an api_key, and whenever a webhook secret is configured.
     */
    public ?string $chatwootSignature;

    /**
     * @var ?string $chatwootTimestamp Unix timestamp used in the HMAC payload.
     */
    public ?string $chatwootTimestamp;

    /**
     * @var array<string, mixed> $body Chatwoot Agent Bot webhook payload (`event` plus message or conversation fields).
     */
    public array $body;

    /**
     * @param array{
     *   body: array<string, mixed>,
     *   chatwootSignature?: ?string,
     *   chatwootTimestamp?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->chatwootSignature = $values['chatwootSignature'] ?? null;
        $this->chatwootTimestamp = $values['chatwootTimestamp'] ?? null;
        $this->body = $values['body'];
    }
}
