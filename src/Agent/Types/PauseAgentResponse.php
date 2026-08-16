<?php

namespace Apologist\Agent\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Types\AgentPauseState;
use Apologist\Core\Json\JsonProperty;

class PauseAgentResponse extends JsonSerializableType
{
    /**
     * @var ?AgentPauseState $data
     */
    #[JsonProperty('data')]
    public ?AgentPauseState $data;

    /**
     * @param array{
     *   data?: ?AgentPauseState,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
