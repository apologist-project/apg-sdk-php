<?php

namespace Apologist\Evaluators\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Core\Types\Union;
use Apologist\Evaluators\Types\EvaluatorRequestReasoningEffort;
use Apologist\Evaluators\Types\EvaluatorRequestVerbosity;
use Apologist\Core\Types\ArrayType;

class EvaluatorRequest extends JsonSerializableType
{
    /**
     * @var ?float $frequencyPenalty
     */
    #[JsonProperty('frequency_penalty')]
    public ?float $frequencyPenalty;

    /**
     * @var ?float $confidenceThreshold
     */
    #[JsonProperty('confidence_threshold')]
    public ?float $confidenceThreshold;

    /**
     * @var (
     *    string
     *   |array<mixed>
     * ) $content
     */
    #[JsonProperty('content'), Union('string', ['mixed'])]
    public string|array $content;

    /**
     * @var ?string $model
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?float $presencePenalty
     */
    #[JsonProperty('presence_penalty')]
    public ?float $presencePenalty;

    /**
     * @var ?value-of<EvaluatorRequestReasoningEffort> $reasoningEffort
     */
    #[JsonProperty('reasoning_effort')]
    public ?string $reasoningEffort;

    /**
     * @var ?value-of<EvaluatorRequestVerbosity> $verbosity
     */
    #[JsonProperty('verbosity')]
    public ?string $verbosity;

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
     * @var ?array<string, ?string> $variables Flat string key/value pairs substituted into `{key}` placeholders in the evaluator prompt. Reserved keys (`options`, `option_descriptions`, `criteria`) cannot be overridden. Not persisted; omitted from the response.
     */
    #[JsonProperty('variables'), ArrayType(['string' => new Union('string', 'null')])]
    public ?array $variables;

    /**
     * @param array{
     *   content: (
     *    string
     *   |array<mixed>
     * ),
     *   frequencyPenalty?: ?float,
     *   confidenceThreshold?: ?float,
     *   model?: ?string,
     *   presencePenalty?: ?float,
     *   reasoningEffort?: ?value-of<EvaluatorRequestReasoningEffort>,
     *   verbosity?: ?value-of<EvaluatorRequestVerbosity>,
     *   temperature?: ?float,
     *   topP?: ?float,
     *   variables?: ?array<string, ?string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->frequencyPenalty = $values['frequencyPenalty'] ?? null;
        $this->confidenceThreshold = $values['confidenceThreshold'] ?? null;
        $this->content = $values['content'];
        $this->model = $values['model'] ?? null;
        $this->presencePenalty = $values['presencePenalty'] ?? null;
        $this->reasoningEffort = $values['reasoningEffort'] ?? null;
        $this->verbosity = $values['verbosity'] ?? null;
        $this->temperature = $values['temperature'] ?? null;
        $this->topP = $values['topP'] ?? null;
        $this->variables = $values['variables'] ?? null;
    }
}
