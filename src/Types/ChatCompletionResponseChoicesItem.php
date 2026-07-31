<?php

namespace ApologistAi\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;
use ApologistAi\Core\Types\ArrayType;

class ChatCompletionResponseChoicesItem extends JsonSerializableType
{
    /**
     * @var ?int $index
     */
    #[JsonProperty('index')]
    public ?int $index;

    /**
     * @var ?ChatMessage $message
     */
    #[JsonProperty('message')]
    public ?ChatMessage $message;

    /**
     * @var ?array<string, mixed> $logprobs
     */
    #[JsonProperty('logprobs'), ArrayType(['string' => 'mixed'])]
    public ?array $logprobs;

    /**
     * @var ?string $finishReason
     */
    #[JsonProperty('finish_reason')]
    public ?string $finishReason;

    /**
     * @param array{
     *   index?: ?int,
     *   message?: ?ChatMessage,
     *   logprobs?: ?array<string, mixed>,
     *   finishReason?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->index = $values['index'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->logprobs = $values['logprobs'] ?? null;
        $this->finishReason = $values['finishReason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
