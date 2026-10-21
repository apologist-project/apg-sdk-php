<?php

namespace Apologist\Channels\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Types\ChatwootConversationMeta;

/**
 * Nested on message events. Conversation events send `id`, `status`, and `meta` at the top level instead.
 */
class ChatwootWebhookPayloadConversation extends JsonSerializableType
{
    /**
     * @var ?int $id Conversation display id.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $status `pending`, `open`, `resolved`, or `snoozed`.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?ChatwootWebhookPayloadConversationAccount $account
     */
    #[JsonProperty('account')]
    public ?ChatwootWebhookPayloadConversationAccount $account;

    /**
     * @var ?ChatwootConversationMeta $meta
     */
    #[JsonProperty('meta')]
    public ?ChatwootConversationMeta $meta;

    /**
     * @param array{
     *   id?: ?int,
     *   status?: ?string,
     *   account?: ?ChatwootWebhookPayloadConversationAccount,
     *   meta?: ?ChatwootConversationMeta,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->account = $values['account'] ?? null;
        $this->meta = $values['meta'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
