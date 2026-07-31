<?php

namespace Apologist\Chat;

use Psr\Http\Client\ClientInterface;
use Apologist\Core\Client\RawClient;
use Apologist\Chat\Requests\ListChatCompletionsRequest;
use Apologist\Chat\Types\ListChatCompletionsResponse;
use Apologist\Exceptions\ApologistAiException;
use Apologist\Exceptions\ApologistAiApiException;
use Apologist\Core\Json\JsonApiRequest;
use Apologist\Environments;
use Apologist\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Apologist\Types\ChatCompletionResponse;
use Apologist\Chat\Requests\LikeRequest;
use Apologist\Types\SuccessResponse;
use Apologist\Chat\Requests\FlagRequest;
use Apologist\Chat\Requests\FeedbackRequest;
use Apologist\Chat\Requests\ShareRequest;
use Apologist\Chat\Types\GetChatCompletionResponse;

class ChatClient
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
     * Returns a paginated list of chat completions (prompts) for the agent, with applied tags expanded as { id, name } and share metadata.
     *
     * Example:
     * ```php
     * $client->chat->listChatCompletions(
     *     new ListChatCompletionsRequest([]),
     * );
     * ```
     *
     * @param ListChatCompletionsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListChatCompletionsResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function listChatCompletions(ListChatCompletionsRequest $request = new ListChatCompletionsRequest(), ?array $options = null): ?ListChatCompletionsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->perPage != null) {
            $query['per_page'] = $request->perPage;
        }
        if ($request->agentId != null) {
            $query['agent_id'] = $request->agentId;
        }
        if ($request->channelId != null) {
            $query['channel_id'] = $request->channelId;
        }
        if ($request->bibleId != null) {
            $query['bible_id'] = $request->bibleId;
        }
        if ($request->cached != null) {
            $query['cached'] = $request->cached;
        }
        if ($request->client != null) {
            $query['client'] = $request->client;
        }
        if ($request->configId != null) {
            $query['config_id'] = $request->configId;
        }
        if ($request->conversationId != null) {
            $query['conversation_id'] = $request->conversationId;
        }
        if ($request->deviceId != null) {
            $query['device_id'] = $request->deviceId;
        }
        if ($request->flagged != null) {
            $query['flagged'] = $request->flagged;
        }
        if ($request->favorited != null) {
            $query['favorited'] = $request->favorited;
        }
        if ($request->language != null) {
            $query['language'] = $request->language;
        }
        if ($request->liked != null) {
            $query['liked'] = $request->liked;
        }
        if ($request->sessionId != null) {
            $query['session_id'] = $request->sessionId;
        }
        if ($request->userId != null) {
            $query['user_id'] = $request->userId;
        }
        if ($request->minTimestamp != null) {
            $query['min_timestamp'] = $request->minTimestamp;
        }
        if ($request->maxTimestamp != null) {
            $query['max_timestamp'] = $request->maxTimestamp;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "chat/completions",
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
                return ListChatCompletionsResponse::fromJson($json);
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
     * Creates a chat completion using the agent's configured model. Supports both streaming and non-streaming responses.
     *
     * Example:
     * ```php
     * $client->chat->createChatCompletion(
     *     [
     *         'key' => "value",
     *     ],
     * );
     * ```
     *
     * @param (
     *    mixed
     * ) $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ChatCompletionResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function createChatCompletion(mixed $request, ?array $options = null): ?ChatCompletionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "chat/completions",
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
                return ChatCompletionResponse::fromJson($json);
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
     * Updates the like status of a specific chat completion
     *
     * Example:
     * ```php
     * $client->chat->likeCompletion(
     *     'id',
     *     new LikeRequest([
     *         'liked' => true,
     *     ]),
     * );
     * ```
     *
     * @param string $id The ID of the chat completion
     * @param LikeRequest $request
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
    public function likeCompletion(string $id, LikeRequest $request, ?array $options = null): ?SuccessResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "chat/completions/{$id}/like",
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
     * Updates the flagged status of a specific chat completion
     *
     * Example:
     * ```php
     * $client->chat->flagCompletion(
     *     'id',
     *     new FlagRequest([
     *         'flagged' => true,
     *     ]),
     * );
     * ```
     *
     * @param string $id The ID of the chat completion
     * @param FlagRequest $request
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
    public function flagCompletion(string $id, FlagRequest $request, ?array $options = null): ?SuccessResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "chat/completions/{$id}/flag",
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
     * Adds user feedback to a specific chat completion
     *
     * Example:
     * ```php
     * $client->chat->feedbackCompletion(
     *     'id',
     *     new FeedbackRequest([
     *         'feedback' => 'feedback',
     *     ]),
     * );
     * ```
     *
     * @param string $id The ID of the chat completion
     * @param FeedbackRequest $request
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
    public function feedbackCompletion(string $id, FeedbackRequest $request, ?array $options = null): ?SuccessResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "chat/completions/{$id}/feedback",
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
     * Creates a share record for a specific chat completion
     *
     * Example:
     * ```php
     * $client->chat->shareCompletion(
     *     'id',
     *     new ShareRequest([]),
     * );
     * ```
     *
     * @param string $id The ID of the chat completion
     * @param ShareRequest $request
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
    public function shareCompletion(string $id, ShareRequest $request = new ShareRequest(), ?array $options = null): ?SuccessResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "chat/completions/{$id}/share",
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
     * Returns a single chat completion (prompt) by numeric id or UUID, including applied tags, guardrail/cta metadata, share metadata, and automation results.
     *
     * Example:
     * ```php
     * $client->chat->getChatCompletion(
     *     'id',
     * );
     * ```
     *
     * @param string $id The numeric id or UUID of the chat completion
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetChatCompletionResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function getChatCompletion(string $id, ?array $options = null): ?GetChatCompletionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "chat/completions/{$id}",
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
                return GetChatCompletionResponse::fromJson($json);
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
