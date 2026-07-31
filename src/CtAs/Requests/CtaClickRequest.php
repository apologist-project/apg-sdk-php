<?php

namespace Apologist\CtAs\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

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
