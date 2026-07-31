<?php

namespace ApologistAi\Users;

use Psr\Http\Client\ClientInterface;
use ApologistAi\Core\Client\RawClient;
use ApologistAi\Users\Requests\ListUsersRequest;
use ApologistAi\Users\Types\ListUsersResponse;
use ApologistAi\Exceptions\ApologistAiException;
use ApologistAi\Exceptions\ApologistAiApiException;
use ApologistAi\Core\Json\JsonApiRequest;
use ApologistAi\Environments;
use ApologistAi\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use ApologistAi\Users\Requests\ListUserFlagsRequest;
use ApologistAi\Users\Types\ListUserFlagsResponse;
use ApologistAi\Users\Types\GetUserResponse;
use ApologistAi\Users\Requests\UserUpdateRequest;
use ApologistAi\Users\Types\UpdateUserResponse;

class UsersClient
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
     * Returns a paginated list of users for the agent's team, with applied tags expanded as { id, name } and the persisted responder id.
     *
     * Example:
     * ```php
     * $client->users->listUsers(
     *     new ListUsersRequest([]),
     * );
     * ```
     *
     * @param ListUsersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListUsersResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function listUsers(ListUsersRequest $request = new ListUsersRequest(), ?array $options = null): ?ListUsersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->perPage != null) {
            $query['per_page'] = $request->perPage;
        }
        if ($request->externalId != null) {
            $query['external_id'] = $request->externalId;
        }
        if ($request->tags != null) {
            $query['tags'] = $request->tags;
        }
        if ($request->responderId != null) {
            $query['responder_id'] = $request->responderId;
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
                    path: "users",
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
                return ListUsersResponse::fromJson($json);
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
     * Returns a paginated list of user flag definitions for the agent's team (all columns from user_flags), ordered by id ascending.
     *
     * Example:
     * ```php
     * $client->users->listUserFlags(
     *     new ListUserFlagsRequest([]),
     * );
     * ```
     *
     * @param ListUserFlagsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListUserFlagsResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function listUserFlags(ListUserFlagsRequest $request = new ListUserFlagsRequest(), ?array $options = null): ?ListUserFlagsResponse
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
                    path: "users/flags",
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
                return ListUserFlagsResponse::fromJson($json);
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
     * Returns a single user by external id or internal id, with expanded tags and the persisted responder for the agent.
     *
     * Example:
     * ```php
     * $client->users->getUser(
     *     'user_id',
     * );
     * ```
     *
     * @param string $userId The user's external id or internal id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetUserResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function getUser(string $userId, ?array $options = null): ?GetUserResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "users/{$userId}",
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
                return GetUserResponse::fromJson($json);
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
     * Updates a user's external_id and/or tags and upserts the persisted responder for the agent. Only provided fields are changed.
     *
     * Example:
     * ```php
     * $client->users->updateUser(
     *     'user_id',
     *     new UserUpdateRequest([]),
     * );
     * ```
     *
     * @param string $userId The user's external id or internal id
     * @param UserUpdateRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateUserResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function updateUser(string $userId, UserUpdateRequest $request = new UserUpdateRequest(), ?array $options = null): ?UpdateUserResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "users/{$userId}",
                    method: HttpMethod::PATCH,
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
                return UpdateUserResponse::fromJson($json);
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
