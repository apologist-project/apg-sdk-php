<?php

namespace ApologistAi\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;
use DateTime;
use ApologistAi\Core\Types\Date;

class WebhookEventInfo extends JsonSerializableType
{
    /**
     * @var value-of<WebhookEventInfoKey> $key Stable machine-readable event key.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var string $label Human-readable event label.
     */
    #[JsonProperty('label')]
    public string $label;

    /**
     * @var DateTime $occurredAt
     */
    #[JsonProperty('occurred_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $occurredAt;

    /**
     * @param array{
     *   key: value-of<WebhookEventInfoKey>,
     *   label: string,
     *   occurredAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->label = $values['label'];
        $this->occurredAt = $values['occurredAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
