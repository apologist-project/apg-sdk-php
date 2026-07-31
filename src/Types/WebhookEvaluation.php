<?php

namespace ApologistAi\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;

/**
 * Result of an evaluation run for CTA/guardrail events.
 */
class WebhookEvaluation extends JsonSerializableType
{
    /**
     * @var ?float $score
     */
    #[JsonProperty('score')]
    public ?float $score;

    /**
     * @var ?bool $passed
     */
    #[JsonProperty('passed')]
    public ?bool $passed;

    /**
     * @var ?string $content
     */
    #[JsonProperty('content')]
    public ?string $content;

    /**
     * @param array{
     *   score?: ?float,
     *   passed?: ?bool,
     *   content?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->score = $values['score'] ?? null;
        $this->passed = $values['passed'] ?? null;
        $this->content = $values['content'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
