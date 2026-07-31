<?php

namespace ApologistAi\Chat\Requests;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;

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
