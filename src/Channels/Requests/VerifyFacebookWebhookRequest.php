<?php

namespace ApologistAi\Channels\Requests;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Channels\Types\VerifyFacebookWebhookRequestHubMode;

class VerifyFacebookWebhookRequest extends JsonSerializableType
{
    /**
     * @var value-of<VerifyFacebookWebhookRequestHubMode> $hubMode
     */
    public string $hubMode;

    /**
     * @var string $hubVerifyToken
     */
    public string $hubVerifyToken;

    /**
     * @var ?string $hubChallenge
     */
    public ?string $hubChallenge;

    /**
     * @param array{
     *   hubMode: value-of<VerifyFacebookWebhookRequestHubMode>,
     *   hubVerifyToken: string,
     *   hubChallenge?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->hubMode = $values['hubMode'];
        $this->hubVerifyToken = $values['hubVerifyToken'];
        $this->hubChallenge = $values['hubChallenge'] ?? null;
    }
}
