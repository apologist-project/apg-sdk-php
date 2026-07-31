<?php

namespace Apologist\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

class ChatCompletionResponseUsage extends JsonSerializableType
{
    /**
     * @var ?int $promptTokens
     */
    #[JsonProperty('prompt_tokens')]
    public ?int $promptTokens;

    /**
     * @var ?int $completionTokens
     */
    #[JsonProperty('completion_tokens')]
    public ?int $completionTokens;

    /**
     * @var ?int $totalTokens
     */
    #[JsonProperty('total_tokens')]
    public ?int $totalTokens;

    /**
     * @param array{
     *   promptTokens?: ?int,
     *   completionTokens?: ?int,
     *   totalTokens?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->promptTokens = $values['promptTokens'] ?? null;
        $this->completionTokens = $values['completionTokens'] ?? null;
        $this->totalTokens = $values['totalTokens'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
