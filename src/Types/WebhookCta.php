<?php

namespace ApologistAi\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;

class WebhookCta extends JsonSerializableType
{
    /**
     * @var int $id
     */
    #[JsonProperty('id')]
    public int $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $content
     */
    #[JsonProperty('content')]
    public ?string $content;

    /**
     * @param array{
     *   id: int,
     *   name?: ?string,
     *   content?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'] ?? null;
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
