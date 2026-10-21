<?php

namespace Apologist\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

/**
 * OpenTelemetry context for the API request that produced this event. Present when the Agent created or continued a W3C trace.
 */
class WebhookPayloadTrace extends JsonSerializableType
{
    /**
     * @var ?string $traceId 32-character hex trace id
     */
    #[JsonProperty('trace_id')]
    public ?string $traceId;

    /**
     * @var ?string $spanId 16-character hex span id
     */
    #[JsonProperty('span_id')]
    public ?string $spanId;

    /**
     * @param array{
     *   traceId?: ?string,
     *   spanId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->traceId = $values['traceId'] ?? null;
        $this->spanId = $values['spanId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
