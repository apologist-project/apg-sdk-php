<?php

namespace Apologist\Channels\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Channels\Types\ChatwootWebhookPayloadAccount;
use Apologist\Channels\Types\ChatwootWebhookPayloadSender;
use Apologist\Channels\Types\ChatwootWebhookPayloadConversation;
use Apologist\Types\ChatwootConversationMeta;

class ChatwootWebhookPayload extends JsonSerializableType
{
    /**
     * @var ?string $chatwootSignature `sha256=` plus hex HMAC-SHA256 of `{timestamp}.{rawBody}` keyed with the Agent Bot webhook secret. Required when the webhook URL does not include an api_key, and whenever a webhook secret is configured.
     */
    public ?string $chatwootSignature;

    /**
     * @var ?string $chatwootTimestamp Unix timestamp used in the HMAC payload.
     */
    public ?string $chatwootTimestamp;

    /**
     * @var ?string $event Chatwoot event name. Incoming visitor messages use `message_created`. Staff takeover and assignment use conversation events such as `conversation_opened`, `conversation_status_changed`, and `conversation_updated`.
     */
    #[JsonProperty('event')]
    public ?string $event;

    /**
     * @var ?int $id Message id on `message_*` events. Conversation display id on `conversation_*` events.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $content Message text. Present on message events. Empty or private notes are ignored.
     */
    #[JsonProperty('content')]
    public ?string $content;

    /**
     * @var ?string $messageType Incoming visitor messages are `incoming` (or `0`). Staff replies are `outgoing` (or `1`).
     */
    #[JsonProperty('message_type')]
    public ?string $messageType;

    /**
     * @var ?bool $private When true, the Agent ignores the message (Chatwoot private note).
     */
    #[JsonProperty('private')]
    public ?bool $private;

    /**
     * @var ?ChatwootWebhookPayloadAccount $account
     */
    #[JsonProperty('account')]
    public ?ChatwootWebhookPayloadAccount $account;

    /**
     * @var ?ChatwootWebhookPayloadSender $sender Present on message events.
     */
    #[JsonProperty('sender')]
    public ?ChatwootWebhookPayloadSender $sender;

    /**
     * @var ?ChatwootWebhookPayloadConversation $conversation Nested on message events. Conversation events send `id`, `status`, and `meta` at the top level instead.
     */
    #[JsonProperty('conversation')]
    public ?ChatwootWebhookPayloadConversation $conversation;

    /**
     * @var ?string $status Top-level conversation status on conversation events.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?ChatwootConversationMeta $meta Top-level conversation meta on conversation events.
     */
    #[JsonProperty('meta')]
    public ?ChatwootConversationMeta $meta;

    /**
     * @param array{
     *   chatwootSignature?: ?string,
     *   chatwootTimestamp?: ?string,
     *   event?: ?string,
     *   id?: ?int,
     *   content?: ?string,
     *   messageType?: ?string,
     *   private?: ?bool,
     *   account?: ?ChatwootWebhookPayloadAccount,
     *   sender?: ?ChatwootWebhookPayloadSender,
     *   conversation?: ?ChatwootWebhookPayloadConversation,
     *   status?: ?string,
     *   meta?: ?ChatwootConversationMeta,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->chatwootSignature = $values['chatwootSignature'] ?? null;
        $this->chatwootTimestamp = $values['chatwootTimestamp'] ?? null;
        $this->event = $values['event'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->content = $values['content'] ?? null;
        $this->messageType = $values['messageType'] ?? null;
        $this->private = $values['private'] ?? null;
        $this->account = $values['account'] ?? null;
        $this->sender = $values['sender'] ?? null;
        $this->conversation = $values['conversation'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->meta = $values['meta'] ?? null;
    }
}
