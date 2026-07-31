<?php

namespace ApologistAi\Channels\Requests;

use ApologistAi\Core\Json\JsonSerializableType;

class ReceiveDiscordInteractionRequest extends JsonSerializableType
{
    /**
     * @var string $signatureEd25519 Discord request signature (hex).
     */
    public string $signatureEd25519;

    /**
     * @var string $signatureTimestamp Discord request timestamp.
     */
    public string $signatureTimestamp;

    /**
     * @var array<string, mixed> $body Discord interaction payload.
     */
    public array $body;

    /**
     * @param array{
     *   signatureEd25519: string,
     *   signatureTimestamp: string,
     *   body: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->signatureEd25519 = $values['signatureEd25519'];
        $this->signatureTimestamp = $values['signatureTimestamp'];
        $this->body = $values['body'];
    }
}
