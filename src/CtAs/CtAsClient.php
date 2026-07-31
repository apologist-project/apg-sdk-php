<?php

namespace ApologistAi\CtAs;

use Psr\Http\Client\ClientInterface;
use ApologistAi\Core\Client\RawClient;
use ApologistAi\CtAs\Types\MatchCtasResponse;
use ApologistAi\Exceptions\ApologistAiException;
use ApologistAi\Exceptions\ApologistAiApiException;
use ApologistAi\Core\Json\JsonApiRequest;
use ApologistAi\Environments;
use ApologistAi\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use ApologistAi\CtAs\Requests\CtaClickRequest;
use ApologistAi\Types\SuccessResponse;

class CtAsClient
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
     * Finds matching CTAs based on conversation context, user, session, device, or messages
     *
     * Example:
     * ```php
     * $client->ctAs->matchCtas(
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
     * @return ?MatchCtasResponse
     * @throws ApologistAiException
     * @throws ApologistAiApiException
     */
    public function matchCtas(mixed $request, ?array $options = null): ?MatchCtasResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "ctas/match",
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
                return MatchCtasResponse::fromJson($json);
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
     * Records that a user clicked on a specific CTA
     *
     * Example:
     * ```php
     * $client->ctAs->logCtaClick(
     *     'id',
     *     new CtaClickRequest([
     *         'promptId' => 'prompt_id',
     *     ]),
     * );
     * ```
     *
     * @param string $id The ID of the CTA
     * @param CtaClickRequest $request
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
    public function logCtaClick(string $id, CtaClickRequest $request, ?array $options = null): ?SuccessResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "ctas/{$id}/click",
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
