<?php

namespace Apologist\Channels\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Channels\Types\VerifyFacebookWebhookRequestHubMode;

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
