<?php

namespace ApologistAi\Chat\Requests;

use ApologistAi\Core\Json\JsonSerializableType;

class ListChatCompletionsRequest extends JsonSerializableType
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
     * @var ?string $agentId
     */
    public ?string $agentId;

    /**
     * @var ?string $channelId
     */
    public ?string $channelId;

    /**
     * @var ?string $bibleId
     */
    public ?string $bibleId;

    /**
     * @var ?string $cached
     */
    public ?string $cached;

    /**
     * @var ?string $client
     */
    public ?string $client;

    /**
     * @var ?string $configId
     */
    public ?string $configId;

    /**
     * @var ?string $conversationId
     */
    public ?string $conversationId;

    /**
     * @var ?string $deviceId
     */
    public ?string $deviceId;

    /**
     * @var ?string $flagged
     */
    public ?string $flagged;

    /**
     * @var ?string $favorited
     */
    public ?string $favorited;

    /**
     * @var ?string $language
     */
    public ?string $language;

    /**
     * @var ?string $liked
     */
    public ?string $liked;

    /**
     * @var ?string $sessionId
     */
    public ?string $sessionId;

    /**
     * @var ?string $userId
     */
    public ?string $userId;

    /**
     * @var ?string $minTimestamp
     */
    public ?string $minTimestamp;

    /**
     * @var ?string $maxTimestamp
     */
    public ?string $maxTimestamp;

    /**
     * @param array{
     *   page?: ?int,
     *   perPage?: ?int,
     *   agentId?: ?string,
     *   channelId?: ?string,
     *   bibleId?: ?string,
     *   cached?: ?string,
     *   client?: ?string,
     *   configId?: ?string,
     *   conversationId?: ?string,
     *   deviceId?: ?string,
     *   flagged?: ?string,
     *   favorited?: ?string,
     *   language?: ?string,
     *   liked?: ?string,
     *   sessionId?: ?string,
     *   userId?: ?string,
     *   minTimestamp?: ?string,
     *   maxTimestamp?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
        $this->agentId = $values['agentId'] ?? null;
        $this->channelId = $values['channelId'] ?? null;
        $this->bibleId = $values['bibleId'] ?? null;
        $this->cached = $values['cached'] ?? null;
        $this->client = $values['client'] ?? null;
        $this->configId = $values['configId'] ?? null;
        $this->conversationId = $values['conversationId'] ?? null;
        $this->deviceId = $values['deviceId'] ?? null;
        $this->flagged = $values['flagged'] ?? null;
        $this->favorited = $values['favorited'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->liked = $values['liked'] ?? null;
        $this->sessionId = $values['sessionId'] ?? null;
        $this->userId = $values['userId'] ?? null;
        $this->minTimestamp = $values['minTimestamp'] ?? null;
        $this->maxTimestamp = $values['maxTimestamp'] ?? null;
    }
}
