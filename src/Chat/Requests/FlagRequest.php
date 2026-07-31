<?php

namespace Apologist\Chat\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

class FlagRequest extends JsonSerializableType
{
    /**
     * @var bool $flagged
     */
    #[JsonProperty('flagged')]
    public bool $flagged;

    /**
     * @param array{
     *   flagged: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->flagged = $values['flagged'];
    }
}
