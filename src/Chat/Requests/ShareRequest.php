<?php

namespace Apologist\Chat\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

class ShareRequest extends JsonSerializableType
{
    /**
     * @var ?string $conversationId
     */
    #[JsonProperty('conversation_id')]
    public ?string $conversationId;

    /**
     * @var ?string $sessionId
     */
    #[JsonProperty('session_id')]
    public ?string $sessionId;

    /**
     * @var ?string $userId
     */
    #[JsonProperty('user_id')]
    public ?string $userId;

    /**
     * @param array{
     *   conversationId?: ?string,
     *   sessionId?: ?string,
     *   userId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversationId = $values['conversationId'] ?? null;
        $this->sessionId = $values['sessionId'] ?? null;
        $this->userId = $values['userId'] ?? null;
    }
}
