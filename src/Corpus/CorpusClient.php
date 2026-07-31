<?php

namespace ApologistAi\Corpus;

use Psr\Http\Client\ClientInterface;
use ApologistAi\Core\Client\RawClient;
use ApologistAi\Corpus\Requests\CorpusSearchRequest;
use ApologistAi\Corpus\Types\SearchCorpusResponse;
use ApologistAi\Exceptions\ApologistAiException;
use ApologistAi\Exceptions\ApologistAiApiException;
use ApologistAi\Core\Json\JsonApiRequest;
use ApologistAi\Environments;
use ApologistAi\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use ApologistAi\Corpus\Requests\ViewRequest;
use ApologistAi\Types\SuccessResponse;
use ApologistAi\Corpus\Requests\ImpressionRequest;
use ApologistAi\Corpus\Requests\LogCorpusReferralRedirectRequest;
use ApologistAi\Corpus\Requests\ReferralRequest;

class CorpusClient
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
     * Performs a semantic search across the agent's corpus of knowledge
     *
     * Example:
     * ```php
     * $client->corpus->searchCorpus(
     *     new CorpusSearchRequest([
     *         'query' => 'query',
     *     ]),
     * );
     * ```
     *
     * @param CorpusSearchRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SearchCorpusResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function searchCorpus(CorpusSearchRequest $request, ?array $options = null): ?SearchCorpusResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "corpus/search",
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
                return SearchCorpusResponse::fromJson($json);
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
     * Records that a user viewed a specific corpus item
     *
     * Example:
     * ```php
     * $client->corpus->logCorpusView(
     *     'model',
     *     'id',
     *     new ViewRequest([
     *         'promptId' => 'prompt_id',
     *     ]),
     * );
     * ```
     *
     * @param string $model The model type (e.g., 'source')
     * @param string $id The ID of the corpus item
     * @param ViewRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SuccessResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function logCorpusView(string $model, string $id, ViewRequest $request, ?array $options = null): ?SuccessResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "corpus/{$model}/{$id}/view",
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
                return SuccessResponse::fromJson($json);
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
     * Records that a corpus item was shown to a user
     *
     * Example:
     * ```php
     * $client->corpus->logCorpusImpression(
     *     'model',
     *     'id',
     *     new ImpressionRequest([
     *         'promptId' => 'prompt_id',
     *     ]),
     * );
     * ```
     *
     * @param string $model The model type (e.g., 'source')
     * @param string $id The ID of the corpus item
     * @param ImpressionRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SuccessResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function logCorpusImpression(string $model, string $id, ImpressionRequest $request, ?array $options = null): ?SuccessResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "corpus/{$model}/{$id}/impression",
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
                return SuccessResponse::fromJson($json);
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
     * Records a referral for a corpus item and, when a `url` is supplied, issues a 302 redirect to it. Without a `url`, responds with a success message. Requires either the search API entitlement or a same-origin request.
     *
     * Example:
     * ```php
     * $client->corpus->logCorpusReferralRedirect(
     *     'model',
     *     'id',
     *     new LogCorpusReferralRedirectRequest([
     *         'promptId' => 'prompt_id',
     *     ]),
     * );
     * ```
     *
     * @param string $model The model type (e.g., 'source')
     * @param string $id The numeric ID of the corpus item
     * @param LogCorpusReferralRedirectRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SuccessResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function logCorpusReferralRedirect(string $model, string $id, LogCorpusReferralRedirectRequest $request, ?array $options = null): ?SuccessResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['prompt_id'] = $request->promptId;
        if ($request->userId != null) {
            $query['user_id'] = $request->userId;
        }
        if ($request->url != null) {
            $query['url'] = $request->url;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "corpus/{$model}/{$id}/referral",
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
                return SuccessResponse::fromJson($json);
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
     * Records that a user was referred to a corpus item
     *
     * Example:
     * ```php
     * $client->corpus->logCorpusReferral(
     *     'model',
     *     'id',
     *     new ReferralRequest([
     *         'promptId' => 'prompt_id',
     *     ]),
     * );
     * ```
     *
     * @param string $model The model type (e.g., 'source')
     * @param string $id The ID of the corpus item
     * @param ReferralRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SuccessResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function logCorpusReferral(string $model, string $id, ReferralRequest $request, ?array $options = null): ?SuccessResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "corpus/{$model}/{$id}/referral",
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
                return SuccessResponse::fromJson($json);
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
