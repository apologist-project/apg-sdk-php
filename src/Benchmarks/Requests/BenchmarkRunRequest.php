<?php

namespace Apologist\Benchmarks\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Core\Types\Union;
use Apologist\Benchmarks\Types\BenchmarkRunRequestReasoningEffort;
use Apologist\Benchmarks\Types\BenchmarkRunRequestVerbosity;

class BenchmarkRunRequest extends JsonSerializableType
{
    /**
     * @var (
     *    string
     *   |array<mixed>
     *   |null
     * ) $content Content to evaluate. Required when `source_id` is supplied.
     */
    #[JsonProperty('content'), Union(new Union('string', 'null'), new Union(['mixed'], 'null'), 'null')]
    public string|array|null $content;

    /**
     * @var ?string $completionId Completion UUID whose stored response should be evaluated.
     */
    #[JsonProperty('completion_id')]
    public ?string $completionId;

    /**
     * @var ?int $sourceId
     */
    #[JsonProperty('source_id')]
    public ?int $sourceId;

    /**
     * @var ?string $model
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?int $numResponses
     */
    #[JsonProperty('num_responses')]
    public ?int $numResponses;

    /**
     * @var ?bool $useQuestionVariants
     */
    #[JsonProperty('use_question_variants')]
    public ?bool $useQuestionVariants;

    /**
     * @var ?value-of<BenchmarkRunRequestReasoningEffort> $reasoningEffort
     */
    #[JsonProperty('reasoning_effort')]
    public ?string $reasoningEffort;

    /**
     * @var ?value-of<BenchmarkRunRequestVerbosity> $verbosity
     */
    #[JsonProperty('verbosity')]
    public ?string $verbosity;

    /**
     * @var ?float $scoreThreshold
     */
    #[JsonProperty('score_threshold')]
    public ?float $scoreThreshold;

    /**
     * @var ?float $valueThreshold
     */
    #[JsonProperty('value_threshold')]
    public ?float $valueThreshold;

    /**
     * @var ?float $temperature
     */
    #[JsonProperty('temperature')]
    public ?float $temperature;

    /**
     * @var ?float $topP
     */
    #[JsonProperty('top_p')]
    public ?float $topP;

    /**
     * @var ?float $frequencyPenalty
     */
    #[JsonProperty('frequency_penalty')]
    public ?float $frequencyPenalty;

    /**
     * @var ?float $presencePenalty
     */
    #[JsonProperty('presence_penalty')]
    public ?float $presencePenalty;

    /**
     * @param array{
     *   content?: (
     *    string
     *   |array<mixed>
     *   |null
     * ),
     *   completionId?: ?string,
     *   sourceId?: ?int,
     *   model?: ?string,
     *   numResponses?: ?int,
     *   useQuestionVariants?: ?bool,
     *   reasoningEffort?: ?value-of<BenchmarkRunRequestReasoningEffort>,
     *   verbosity?: ?value-of<BenchmarkRunRequestVerbosity>,
     *   scoreThreshold?: ?float,
     *   valueThreshold?: ?float,
     *   temperature?: ?float,
     *   topP?: ?float,
     *   frequencyPenalty?: ?float,
     *   presencePenalty?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->content = $values['content'] ?? null;
        $this->completionId = $values['completionId'] ?? null;
        $this->sourceId = $values['sourceId'] ?? null;
        $this->model = $values['model'] ?? null;
        $this->numResponses = $values['numResponses'] ?? null;
        $this->useQuestionVariants = $values['useQuestionVariants'] ?? null;
        $this->reasoningEffort = $values['reasoningEffort'] ?? null;
        $this->verbosity = $values['verbosity'] ?? null;
        $this->scoreThreshold = $values['scoreThreshold'] ?? null;
        $this->valueThreshold = $values['valueThreshold'] ?? null;
        $this->temperature = $values['temperature'] ?? null;
        $this->topP = $values['topP'] ?? null;
        $this->frequencyPenalty = $values['frequencyPenalty'] ?? null;
        $this->presencePenalty = $values['presencePenalty'] ?? null;
    }
}
