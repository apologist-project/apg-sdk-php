<?php

namespace Apologist\Conversations;

use Psr\Http\Client\ClientInterface;
use Apologist\Core\Client\RawClient;
use Apologist\Conversations\Requests\ListConversationsRequest;
use Apologist\Conversations\Types\ListConversationsResponse;
use Apologist\Exceptions\ApologistAiException;
use Apologist\Exceptions\ApologistAiApiException;
use Apologist\Core\Json\JsonApiRequest;
use Apologist\Environments;
use Apologist\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Apologist\Conversations\Types\GetConversationResponse;
use Apologist\Conversations\Types\PauseConversationResponse;
use Apologist\Conversations\Types\ResumeConversationResponse;

class ConversationsClient
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
     * Returns a paginated list of conversations for the requesting agent, newest first.
     *
     * Example:
     * ```php
     * $client->conversations->listConversations(
     *     new ListConversationsRequest([]),
     * );
     * ```
     *
     * @param ListConversationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListConversationsResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function listConversations(ListConversationsRequest $request = new ListConversationsRequest(), ?array $options = null): ?ListConversationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->perPage != null) {
            $query['per_page'] = $request->perPage;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations",
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
                return ListConversationsResponse::fromJson($json);
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
     * Returns a single conversation by internal UUID or team-scoped external id.
     *
     * Example:
     * ```php
     * $client->conversations->getConversation(
     *     'id',
     * );
     * ```
     *
     * @param string $id The conversation UUID or team-scoped external id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetConversationResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function getConversation(string $id, ?array $options = null): ?GetConversationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations/{$id}",
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
                return GetConversationResponse::fromJson($json);
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
     * Pauses the agent on a conversation identified by internal UUID or team-scoped external id. Requires an API key.
     *
     * Example:
     * ```php
     * $client->conversations->pauseConversation(
     *     'id',
     * );
     * ```
     *
     * @param string $id The conversation UUID or team-scoped external id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PauseConversationResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function pauseConversation(string $id, ?array $options = null): ?PauseConversationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations/{$id}/pause",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return PauseConversationResponse::fromJson($json);
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
     * Resumes the agent on a conversation identified by internal UUID or team-scoped external id. Requires an API key.
     *
     * Example:
     * ```php
     * $client->conversations->resumeConversation(
     *     'id',
     * );
     * ```
     *
     * @param string $id The conversation UUID or team-scoped external id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ResumeConversationResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function resumeConversation(string $id, ?array $options = null): ?ResumeConversationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations/{$id}/resume",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ResumeConversationResponse::fromJson($json);
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
