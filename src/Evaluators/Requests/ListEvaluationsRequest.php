<?php

namespace Apologist\Evaluators\Requests;

use Apologist\Core\Json\JsonSerializableType;

class ListEvaluationsRequest extends JsonSerializableType
{
    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?int $perPage Results per page (clamped to 100).
     */
    public ?int $perPage;

    /**
     * @var ?string $minTimestamp
     */
    public ?string $minTimestamp;

    /**
     * @var ?string $maxTimestamp
     */
    public ?string $maxTimestamp;

    /**
     * @var ?string $minDuration
     */
    public ?string $minDuration;

    /**
     * @var ?string $maxDuration
     */
    public ?string $maxDuration;

    /**
     * @var ?string $minScore
     */
    public ?string $minScore;

    /**
     * @var ?string $maxScore
     */
    public ?string $maxScore;

    /**
     * @var ?string $passed
     */
    public ?string $passed;

    /**
     * @var ?string $benchmark
     */
    public ?string $benchmark;

    /**
     * @var ?string $benchmarkRunId
     */
    public ?string $benchmarkRunId;

    /**
     * @var ?string $benchmarkQuestionId
     */
    public ?string $benchmarkQuestionId;

    /**
     * @param array{
     *   page?: ?int,
     *   perPage?: ?int,
     *   minTimestamp?: ?string,
     *   maxTimestamp?: ?string,
     *   minDuration?: ?string,
     *   maxDuration?: ?string,
     *   minScore?: ?string,
     *   maxScore?: ?string,
     *   passed?: ?string,
     *   benchmark?: ?string,
     *   benchmarkRunId?: ?string,
     *   benchmarkQuestionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
        $this->minTimestamp = $values['minTimestamp'] ?? null;
        $this->maxTimestamp = $values['maxTimestamp'] ?? null;
        $this->minDuration = $values['minDuration'] ?? null;
        $this->maxDuration = $values['maxDuration'] ?? null;
        $this->minScore = $values['minScore'] ?? null;
        $this->maxScore = $values['maxScore'] ?? null;
        $this->passed = $values['passed'] ?? null;
        $this->benchmark = $values['benchmark'] ?? null;
        $this->benchmarkRunId = $values['benchmarkRunId'] ?? null;
        $this->benchmarkQuestionId = $values['benchmarkQuestionId'] ?? null;
    }
}
