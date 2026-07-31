<?php

namespace ApologistAi\Corpus\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;
use ApologistAi\Core\Types\ArrayType;

class SearchCorpusResponse extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $results
     */
    #[JsonProperty('results'), ArrayType([['string' => 'mixed']])]
    public ?array $results;

    /**
     * @param array{
     *   results?: ?array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->results = $values['results'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
