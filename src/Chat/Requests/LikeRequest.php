<?php

namespace ApologistAi\Chat\Requests;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;

class LikeRequest extends JsonSerializableType
{
    /**
     * @var bool $liked
     */
    #[JsonProperty('liked')]
    public bool $liked;

    /**
     * @param array{
     *   liked: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->liked = $values['liked'];
    }
}
