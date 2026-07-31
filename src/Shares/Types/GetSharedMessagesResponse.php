<?php

namespace Apologist\Shares\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Core\Types\ArrayType;

class GetSharedMessagesResponse extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $messages
     */
    #[JsonProperty('messages'), ArrayType([['string' => 'mixed']])]
    public ?array $messages;

    /**
     * @param array{
     *   messages?: ?array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->messages = $values['messages'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
