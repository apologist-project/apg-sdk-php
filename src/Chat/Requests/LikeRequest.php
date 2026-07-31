<?php

namespace Apologist\Chat\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

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
