<?php

namespace ApologistAi\CtAs\Requests;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;

class CtaClickRequest extends JsonSerializableType
{
    /**
     * @var string $promptId
     */
    #[JsonProperty('prompt_id')]
    public string $promptId;

    /**
     * @param array{
     *   promptId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->promptId = $values['promptId'];
    }
}
