<?php

namespace Apologist\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Core\Types\ArrayType;
use Apologist\Core\Types\Union;

class ChatCompletionRequestMetadata extends JsonSerializableType
{
    /**
     * @var ?bool $anonymous
     */
    #[JsonProperty('anonymous')]
    public ?bool $anonymous;

    /**
     * @var ?string $conversation
     */
    #[JsonProperty('conversation')]
    public ?string $conversation;

    /**
     * @var ?string $language
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?int $maxMemories
     */
    #[JsonProperty('max_memories')]
    public ?int $maxMemories;

    /**
     * @var ?string $parentUrl
     */
    #[JsonProperty('parent_url')]
    public ?string $parentUrl;

    /**
     * @var ?string $parentHost
     */
    #[JsonProperty('parent_host')]
    public ?string $parentHost;

    /**
     * @var ?string $session
     */
    #[JsonProperty('session')]
    public ?string $session;

    /**
     * @var ?string $device
     */
    #[JsonProperty('device')]
    public ?string $device;

    /**
     * @var ?int $sharedPrompt
     */
    #[JsonProperty('shared_prompt')]
    public ?int $sharedPrompt;

    /**
     * @var ?string $translation
     */
    #[JsonProperty('translation')]
    public ?string $translation;

    /**
     * @var ?array<string, ?string> $variables String key/value pairs substituted into `{key}` placeholders in the assembled system prompt. Never persisted; omitted from response metadata. Reserved system keys (language, bible, translation, passages, date/geo tokens) cannot be overridden.
     */
    #[JsonProperty('variables'), ArrayType(['string' => new Union('string', 'null')])]
    public ?array $variables;

    /**
     * @param array{
     *   anonymous?: ?bool,
     *   conversation?: ?string,
     *   language?: ?string,
     *   maxMemories?: ?int,
     *   parentUrl?: ?string,
     *   parentHost?: ?string,
     *   session?: ?string,
     *   device?: ?string,
     *   sharedPrompt?: ?int,
     *   translation?: ?string,
     *   variables?: ?array<string, ?string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->anonymous = $values['anonymous'] ?? null;
        $this->conversation = $values['conversation'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->maxMemories = $values['maxMemories'] ?? null;
        $this->parentUrl = $values['parentUrl'] ?? null;
        $this->parentHost = $values['parentHost'] ?? null;
        $this->session = $values['session'] ?? null;
        $this->device = $values['device'] ?? null;
        $this->sharedPrompt = $values['sharedPrompt'] ?? null;
        $this->translation = $values['translation'] ?? null;
        $this->variables = $values['variables'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
