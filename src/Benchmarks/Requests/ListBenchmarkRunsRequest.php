<?php

namespace ApologistAi\Benchmarks\Requests;

use ApologistAi\Core\Json\JsonSerializableType;

class ListBenchmarkRunsRequest extends JsonSerializableType
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
     * @var ?string $minResponses
     */
    public ?string $minResponses;

    /**
     * @var ?string $maxResponses
     */
    public ?string $maxResponses;

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
     *   minResponses?: ?string,
     *   maxResponses?: ?string,
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
        $this->minResponses = $values['minResponses'] ?? null;
        $this->maxResponses = $values['maxResponses'] ?? null;
    }
}
