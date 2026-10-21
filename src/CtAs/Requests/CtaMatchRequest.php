<?php

namespace Apologist\CtAs\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Types\ChatMessage;
use Apologist\Core\Types\ArrayType;
use Apologist\Core\Types\Union;

class CtaMatchRequest extends JsonSerializableType
{
    /**
     * @var ?string $conversation
     */
    #[JsonProperty('conversation')]
    public ?string $conversation;

    /**
     * @var ?string $client
     */
    #[JsonProperty('client')]
    public ?string $client;

    /**
     * @var ?string $device
     */
    #[JsonProperty('device')]
    public ?string $device;

    /**
     * @var ?string $language ISO language code, or `auto` to detect from the prompt.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?int $limit
     */
    #[JsonProperty('limit')]
    public ?int $limit;

    /**
     * @var ?array<ChatMessage> $messages Chat messages in OpenAI format.
     */
    #[JsonProperty('messages'), ArrayType([ChatMessage::class])]
    public ?array $messages;

    /**
     * @var ?string $session
     */
    #[JsonProperty('session')]
    public ?string $session;

    /**
     * @var ?string $user
     */
    #[JsonProperty('user')]
    public ?string $user;

    /**
     * @var ?array<string, ?string> $variables Flat string key/value pairs substituted into `{key}` placeholders in evaluator prompts run during CTA matching. Not persisted.
     */
    #[JsonProperty('variables'), ArrayType(['string' => new Union('string', 'null')])]
    public ?array $variables;

    /**
     * @param array{
     *   conversation?: ?string,
     *   client?: ?string,
     *   device?: ?string,
     *   language?: ?string,
     *   limit?: ?int,
     *   messages?: ?array<ChatMessage>,
     *   session?: ?string,
     *   user?: ?string,
     *   variables?: ?array<string, ?string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversation = $values['conversation'] ?? null;
        $this->client = $values['client'] ?? null;
        $this->device = $values['device'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->messages = $values['messages'] ?? null;
        $this->session = $values['session'] ?? null;
        $this->user = $values['user'] ?? null;
        $this->variables = $values['variables'] ?? null;
    }
}
