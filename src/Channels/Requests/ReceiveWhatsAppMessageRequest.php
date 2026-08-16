<?php

namespace Apologist\Channels\Requests;

use Apologist\Core\Json\JsonSerializableType;

class ReceiveWhatsAppMessageRequest extends JsonSerializableType
{
    /**
     * @var ?string $hubSignature256 Meta `sha256=<hex>` HMAC of the raw body keyed with the WhatsApp App Secret. Required when the channel has an App Secret configured and the webhook URL does not include an api_key.
     */
    public ?string $hubSignature256;

    /**
     * @var array<string, mixed> $body WhatsApp Cloud API webhook payload (`entry` + `changes`).
     */
    public array $body;

    /**
     * @param array{
     *   body: array<string, mixed>,
     *   hubSignature256?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->hubSignature256 = $values['hubSignature256'] ?? null;
        $this->body = $values['body'];
    }
}
