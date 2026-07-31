<?php

namespace ApologistAi\Corpus\Requests;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;
use ApologistAi\Corpus\Types\CorpusSearchRequestFilters;

class CorpusSearchRequest extends JsonSerializableType
{
    /**
     * @var string $query
     */
    #[JsonProperty('query')]
    public string $query;

    /**
     * @var ?string $promptId
     */
    #[JsonProperty('prompt_id')]
    public ?string $promptId;

    /**
     * @var ?int $limit
     */
    #[JsonProperty('limit')]
    public ?int $limit;

    /**
     * @var ?CorpusSearchRequestFilters $filters
     */
    #[JsonProperty('filters')]
    public ?CorpusSearchRequestFilters $filters;

    /**
     * @param array{
     *   query: string,
     *   promptId?: ?string,
     *   limit?: ?int,
     *   filters?: ?CorpusSearchRequestFilters,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->query = $values['query'];
        $this->promptId = $values['promptId'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->filters = $values['filters'] ?? null;
    }
}
