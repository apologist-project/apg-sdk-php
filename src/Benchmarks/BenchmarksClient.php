<?php

namespace ApologistAi\Benchmarks;

use Psr\Http\Client\ClientInterface;
use ApologistAi\Core\Client\RawClient;
use ApologistAi\Benchmarks\Requests\ListBenchmarkRunsRequest;
use ApologistAi\Benchmarks\Types\ListBenchmarkRunsResponse;
use ApologistAi\Exceptions\ApologistAiException;
use ApologistAi\Exceptions\ApologistAiApiException;
use ApologistAi\Core\Json\JsonApiRequest;
use ApologistAi\Environments;
use ApologistAi\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use ApologistAi\Benchmarks\Requests\BenchmarkRunRequest;
use ApologistAi\Core\Json\JsonDecoder;
use ApologistAi\Benchmarks\Types\GetBenchmarkRunResponse;

class BenchmarksClient
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
     * Returns a paginated list of runs for a benchmark, scoped to the requesting agent. Each run carries nested evaluators, questions, and a flat evaluations array.
     *
     * Example:
     * ```php
     * $client->benchmarks->listBenchmarkRuns(
     *     'id',
     *     new ListBenchmarkRunsRequest([]),
     * );
     * ```
     *
     * @param string $id The id or key of the benchmark
     * @param ListBenchmarkRunsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListBenchmarkRunsResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function listBenchmarkRuns(string $id, ListBenchmarkRunsRequest $request = new ListBenchmarkRunsRequest(), ?array $options = null): ?ListBenchmarkRunsResponse
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
        if ($request->minResponses != null) {
            $query['min_responses'] = $request->minResponses;
        }
        if ($request->maxResponses != null) {
            $query['max_responses'] = $request->maxResponses;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "benchmarks/{$id}/runs",
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
                return ListBenchmarkRunsResponse::fromJson($json);
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
     * Executes a benchmark run and returns the aggregated result with nested evaluators, questions, and a flat evaluations array.
     *
     * Example:
     * ```php
     * $client->benchmarks->runBenchmark(
     *     'id',
     *     new BenchmarkRunRequest([]),
     * );
     * ```
     *
     * @param string $id The id or key of the benchmark
     * @param BenchmarkRunRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<string, mixed>
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function runBenchmark(string $id, BenchmarkRunRequest $request = new BenchmarkRunRequest(), ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "benchmarks/{$id}/runs",
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
                return JsonDecoder::decodeArray($json, ['string' => 'mixed']); // @phpstan-ignore-line
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
     * Returns a single benchmark run by id or UUID, scoped to the requesting agent, including nested evaluators, questions, and evaluations.
     *
     * Example:
     * ```php
     * $client->benchmarks->getBenchmarkRun(
     *     'id',
     *     'runId',
     * );
     * ```
     *
     * @param string $id The id or key of the benchmark
     * @param string $runId The id or UUID of the run
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetBenchmarkRunResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function getBenchmarkRun(string $id, string $runId, ?array $options = null): ?GetBenchmarkRunResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "benchmarks/{$id}/runs/{$runId}",
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
                return GetBenchmarkRunResponse::fromJson($json);
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
