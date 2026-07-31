<?php

namespace ApologistAi\Corpus\Requests;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;

class ViewRequest extends JsonSerializableType
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
