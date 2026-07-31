<?php

namespace Apologist\Corpus\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

class ReferralRequest extends JsonSerializableType
{
    /**
     * @var string $promptId
     */
    #[JsonProperty('prompt_id')]
    public string $promptId;

    /**
     * @var ?string $userId
     */
    #[JsonProperty('user_id')]
    public ?string $userId;

    /**
     * @param array{
     *   promptId: string,
     *   userId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->promptId = $values['promptId'];
        $this->userId = $values['userId'] ?? null;
    }
}
