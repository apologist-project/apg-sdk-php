<?php

namespace Apologist\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Core\Types\ArrayType;

class ChatCompletionResponse extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $object
     */
    #[JsonProperty('object')]
    public ?string $object;

    /**
     * @var ?int $created
     */
    #[JsonProperty('created')]
    public ?int $created;

    /**
     * @var ?string $model
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?array<ChatCompletionResponseChoicesItem> $choices
     */
    #[JsonProperty('choices'), ArrayType([ChatCompletionResponseChoicesItem::class])]
    public ?array $choices;

    /**
     * @var ?ChatCompletionResponseUsage $usage
     */
    #[JsonProperty('usage')]
    public ?ChatCompletionResponseUsage $usage;

    /**
     * @var ?bool $cached
     */
    #[JsonProperty('cached')]
    public ?bool $cached;

    /**
     * @param array{
     *   id?: ?string,
     *   object?: ?string,
     *   created?: ?int,
     *   model?: ?string,
     *   choices?: ?array<ChatCompletionResponseChoicesItem>,
     *   usage?: ?ChatCompletionResponseUsage,
     *   cached?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->object = $values['object'] ?? null;
        $this->created = $values['created'] ?? null;
        $this->model = $values['model'] ?? null;
        $this->choices = $values['choices'] ?? null;
        $this->usage = $values['usage'] ?? null;
        $this->cached = $values['cached'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
