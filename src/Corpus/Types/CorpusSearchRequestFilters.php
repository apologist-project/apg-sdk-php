<?php

namespace ApologistAi\Corpus\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;
use ApologistAi\Core\Types\ArrayType;

class CorpusSearchRequestFilters extends JsonSerializableType
{
    /**
     * @var ?string $model
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?array<int> $ids
     */
    #[JsonProperty('ids'), ArrayType(['integer'])]
    public ?array $ids;

    /**
     * @var ?array<string> $types
     */
    #[JsonProperty('types'), ArrayType(['string'])]
    public ?array $types;

    /**
     * @var ?array<string> $languages
     */
    #[JsonProperty('languages'), ArrayType(['string'])]
    public ?array $languages;

    /**
     * @var ?array<int> $collectionIds
     */
    #[JsonProperty('collection_ids'), ArrayType(['integer'])]
    public ?array $collectionIds;

    /**
     * @var ?array<int> $contributorIds
     */
    #[JsonProperty('contributor_ids'), ArrayType(['integer'])]
    public ?array $contributorIds;

    /**
     * @var ?array<int> $categoryIds
     */
    #[JsonProperty('category_ids'), ArrayType(['integer'])]
    public ?array $categoryIds;

    /**
     * @var ?array<int> $classificationIds
     */
    #[JsonProperty('classification_ids'), ArrayType(['integer'])]
    public ?array $classificationIds;

    /**
     * @param array{
     *   model?: ?string,
     *   ids?: ?array<int>,
     *   types?: ?array<string>,
     *   languages?: ?array<string>,
     *   collectionIds?: ?array<int>,
     *   contributorIds?: ?array<int>,
     *   categoryIds?: ?array<int>,
     *   classificationIds?: ?array<int>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->model = $values['model'] ?? null;
        $this->ids = $values['ids'] ?? null;
        $this->types = $values['types'] ?? null;
        $this->languages = $values['languages'] ?? null;
        $this->collectionIds = $values['collectionIds'] ?? null;
        $this->contributorIds = $values['contributorIds'] ?? null;
        $this->categoryIds = $values['categoryIds'] ?? null;
        $this->classificationIds = $values['classificationIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
