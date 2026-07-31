<?php

namespace ApologistAi\Corpus\Requests;

use ApologistAi\Core\Json\JsonSerializableType;

class LogCorpusReferralRedirectRequest extends JsonSerializableType
{
    /**
     * @var string $promptId
     */
    public string $promptId;

    /**
     * @var ?string $userId
     */
    public ?string $userId;

    /**
     * @var ?string $url URL-encoded destination to redirect to after logging the referral.
     */
    public ?string $url;

    /**
     * @param array{
     *   promptId: string,
     *   userId?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->promptId = $values['promptId'];
        $this->userId = $values['userId'] ?? null;
        $this->url = $values['url'] ?? null;
    }
}
