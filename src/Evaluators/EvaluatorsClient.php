<?php

namespace Apologist\Evaluators;

use Psr\Http\Client\ClientInterface;
use Apologist\Core\Client\RawClient;
use Apologist\Evaluators\Requests\ListEvaluationsRequest;
use Apologist\Evaluators\Types\ListEvaluationsResponse;
use Apologist\Exceptions\ApologistAiException;
use Apologist\Exceptions\ApologistAiApiException;
use Apologist\Core\Json\JsonApiRequest;
use Apologist\Environments;
use Apologist\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Apologist\Evaluators\Requests\EvaluatorRequest;
use Apologist\Evaluators\Types\EvaluateContentResponse;
use Apologist\Evaluators\Types\GetEvaluationResponse;

class EvaluatorsClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * Returns a paginated list of evaluations for the evaluator, scoped to the requesting agent.
     *
     * Example:
     * ```php
     * $client->evaluators->listEvaluations(
     *     'id',
     *     new ListEvaluationsRequest([]),
     * );
     * ```
     *
     * @param string $id The ID or key of the evaluator
     * @param ListEvaluationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListEvaluationsResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function listEvaluations(string $id, ListEvaluationsRequest $request = new ListEvaluationsRequest(), ?array $options = null): ?ListEvaluationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->perPage != null) {
            $query['per_page'] = $request->perPage;
        }
        if ($request->minTimestamp != null) {
            $query['min_timestamp'] = $request->minTimestamp;
        }
        if ($request->maxTimestamp != null) {
            $query['max_timestamp'] = $request->maxTimestamp;
        }
        if ($request->minDuration != null) {
            $query['min_duration'] = $request->minDuration;
        }
        if ($request->maxDuration != null) {
            $query['max_duration'] = $request->maxDuration;
        }
        if ($request->minScore != null) {
            $query['min_score'] = $request->minScore;
        }
        if ($request->maxScore != null) {
            $query['max_score'] = $request->maxScore;
        }
        if ($request->passed != null) {
            $query['passed'] = $request->passed;
        }
        if ($request->benchmark != null) {
            $query['benchmark'] = $request->benchmark;
        }
        if ($request->benchmarkRunId != null) {
            $query['benchmark_run_id'] = $request->benchmarkRunId;
        }
        if ($request->benchmarkQuestionId != null) {
            $query['benchmark_question_id'] = $request->benchmarkQuestionId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "evaluators/{$id}/evaluations",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListEvaluationsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new ApologistAiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new ApologistAiException(message: $e->getMessage(), previous: $e);
        }
        throw new ApologistAiApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Runs an evaluation on the provided content using the specified evaluator
     *
     * Example:
     * ```php
     * $client->evaluators->evaluateContent(
     *     'id',
     *     new EvaluatorRequest([
     *         'content' => 'content',
     *     ]),
     * );
     * ```
     *
     * @param string $id The ID or key of the evaluator
     * @param EvaluatorRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?EvaluateContentResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function evaluateContent(string $id, EvaluatorRequest $request, ?array $options = null): ?EvaluateContentResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "evaluators/{$id}/evaluations",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return EvaluateContentResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new ApologistAiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new ApologistAiException(message: $e->getMessage(), previous: $e);
        }
        throw new ApologistAiApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns a single evaluation for the evaluator, scoped to the requesting agent.
     *
     * Example:
     * ```php
     * $client->evaluators->getEvaluation(
     *     'id',
     *     'evaluationId',
     * );
     * ```
     *
     * @param string $id The id or key of the evaluator
     * @param string $evaluationId The id or UUID of the evaluation
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetEvaluationResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function getEvaluation(string $id, string $evaluationId, ?array $options = null): ?GetEvaluationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "evaluators/{$id}/evaluations/{$evaluationId}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return GetEvaluationResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new ApologistAiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new ApologistAiException(message: $e->getMessage(), previous: $e);
        }
        throw new ApologistAiApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
