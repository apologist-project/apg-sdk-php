<?php

namespace Apologist\Chat\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

class FeedbackRequest extends JsonSerializableType
{
    /**
     * @var string $feedback
     */
    #[JsonProperty('feedback')]
    public string $feedback;

    /**
     * @param array{
     *   feedback: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->feedback = $values['feedback'];
    }
}
