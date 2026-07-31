<?php

namespace Apologist\Channels;

use Psr\Http\Client\ClientInterface;
use Apologist\Core\Client\RawClient;
use Apologist\Channels\Types\GetDiscordChannelStatusResponse;
use Apologist\Exceptions\ApologistAiException;
use Apologist\Exceptions\ApologistAiApiException;
use Apologist\Core\Json\JsonApiRequest;
use Apologist\Environments;
use Apologist\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Apologist\Channels\Requests\ReceiveDiscordInteractionRequest;
use Apologist\Channels\Requests\VerifyFacebookWebhookRequest;
use Apologist\Channels\Requests\ReceiveFacebookMessageRequest;
use Apologist\Channels\Requests\ReceiveTelegramUpdateRequest;
use Apologist\Channels\Requests\ReceiveTwilioMessageRequest;
use Apologist\Core\Client\UrlEncodedApiRequest;

class ChannelsClient
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
     * Returns the status of the Discord channel. Used as a lightweight health/verification endpoint.
     *
     * Example:
     * ```php
     * $client->channels->getDiscordChannelStatus(
     *     'id',
     * );
     * ```
     *
     * @param string $id The channel id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetDiscordChannelStatusResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function getDiscordChannelStatus(string $id, ?array $options = null): ?GetDiscordChannelStatusResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "channels/{$id}/discord",
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
                return GetDiscordChannelStatusResponse::fromJson($json);
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
     * Receives Discord interaction callbacks for the channel. Requests are verified via Ed25519 signature headers; unsigned or invalid requests are rejected. Payload shape is defined by Discord.
     *
     * Example:
     * ```php
     * $client->channels->receiveDiscordInteraction(
     *     'id',
     *     new ReceiveDiscordInteractionRequest([
     *         'signatureEd25519' => 'x-signature-ed25519',
     *         'signatureTimestamp' => 'x-signature-timestamp',
     *         'body' => [
     *             'key' => "value",
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param string $id The channel id
     * @param ReceiveDiscordInteractionRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function receiveDiscordInteraction(string $id, ReceiveDiscordInteractionRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        $headers = [];
        $headers['x-signature-ed25519'] = $request->signatureEd25519;
        $headers['x-signature-timestamp'] = $request->signatureTimestamp;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "channels/{$id}/discord",
                    method: HttpMethod::POST,
                    headers: $headers,
                    body: $request->body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
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
     * Handles the Meta webhook verification handshake, echoing `hub.challenge` when `hub.verify_token` matches the channel's configured token.
     *
     * Example:
     * ```php
     * $client->channels->verifyFacebookWebhook(
     *     'id',
     *     new VerifyFacebookWebhookRequest([
     *         'hubMode' => VerifyFacebookWebhookRequestHubMode::Subscribe->value,
     *         'hubVerifyToken' => 'hub.verify_token',
     *     ]),
     * );
     * ```
     *
     * @param string $id The channel id
     * @param VerifyFacebookWebhookRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return string
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function verifyFacebookWebhook(string $id, VerifyFacebookWebhookRequest $request, ?array $options = null): string
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['hub.mode'] = $request->hubMode;
        $query['hub.verify_token'] = $request->hubVerifyToken;
        if ($request->hubChallenge != null) {
            $query['hub.challenge'] = $request->hubChallenge;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "channels/{$id}/facebook",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return $response->getBody()->getContents();
            }
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
     * Receives Facebook/Messenger (and Instagram-style) message events for the channel. Payload shape is defined by Meta.
     *
     * Example:
     * ```php
     * $client->channels->receiveFacebookMessage(
     *     'id',
     *     new ReceiveFacebookMessageRequest([
     *         'body' => [
     *             'key' => "value",
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param string $id The channel id
     * @param ReceiveFacebookMessageRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function receiveFacebookMessage(string $id, ReceiveFacebookMessageRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "channels/{$id}/facebook",
                    method: HttpMethod::POST,
                    body: $request->body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
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
     * Returns a static HTML privacy policy page for the Instagram integration.
     *
     * Example:
     * ```php
     * $client->channels->getInstagramPrivacyPolicy(
     *     'id',
     * );
     * ```
     *
     * @param string $id The channel id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return string
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function getInstagramPrivacyPolicy(string $id, ?array $options = null): string
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "channels/{$id}/instagram/privacy",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return $response->getBody()->getContents();
            }
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
     * Receives Telegram bot update events for the channel. Non-message updates are acknowledged and ignored. Payload shape is defined by Telegram.
     *
     * Example:
     * ```php
     * $client->channels->receiveTelegramUpdate(
     *     'id',
     *     new ReceiveTelegramUpdateRequest([
     *         'body' => [
     *             'key' => "value",
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param string $id The channel id
     * @param ReceiveTelegramUpdateRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function receiveTelegramUpdate(string $id, ReceiveTelegramUpdateRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "channels/{$id}/telegram",
                    method: HttpMethod::POST,
                    body: $request->body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
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
     * Receives inbound Twilio messages for the channel as form-encoded data. Payload fields are defined by Twilio.
     *
     * Example:
     * ```php
     * $client->channels->receiveTwilioMessage(
     *     'id',
     *     new ReceiveTwilioMessageRequest([]),
     * );
     * ```
     *
     * @param string $id The channel id
     * @param ReceiveTwilioMessageRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function receiveTwilioMessage(string $id, ReceiveTwilioMessageRequest $request = new ReceiveTwilioMessageRequest(), ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new UrlEncodedApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "channels/{$id}/twilio",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
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
