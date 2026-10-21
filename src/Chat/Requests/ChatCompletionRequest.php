<?php

namespace Apologist\Chat\Requests;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Core\Types\ArrayType;
use Apologist\Core\Types\Union;
use Apologist\Types\ChatMessage;
use Apologist\Chat\Types\ChatCompletionRequestMetadata;
use Apologist\Chat\Types\ChatCompletionRequestReasoningEffort;
use Apologist\Chat\Types\ChatCompletionRequestVerbosity;
use Apologist\Chat\Types\ChatCompletionRequestResponseFormat;
use Apologist\Chat\Types\ChatCompletionRequestToolChoiceZero;

class ChatCompletionRequest extends JsonSerializableType
{
    /**
     * @var ?string $traceparent W3C Trace Context parent. When present, the Agent continues this trace for the request. Applies to all `/api/v1` endpoints.
     */
    public ?string $traceparent;

    /**
     * @var ?string $tracestate Optional W3C tracestate associated with traceparent.
     */
    public ?string $tracestate;

    /**
     * @var ?string $baggage Optional W3C baggage. Prompt text is never copied onto spans.
     */
    public ?string $baggage;

    /**
     * @var ?array<string, mixed> $audio
     */
    #[JsonProperty('audio'), ArrayType(['string' => 'mixed'])]
    public ?array $audio;

    /**
     * @var ?float $frequencyPenalty
     */
    #[JsonProperty('frequency_penalty')]
    public ?float $frequencyPenalty;

    /**
     * @var ?array<string, mixed> $logitBias
     */
    #[JsonProperty('logit_bias'), ArrayType(['string' => 'mixed'])]
    public ?array $logitBias;

    /**
     * @var (
     *    bool
     *   |int
     * )|null $logprobs
     */
    #[JsonProperty('logprobs'), Union('bool', 'integer', 'null')]
    public bool|int|null $logprobs;

    /**
     * @var ?int $topLogprobs
     */
    #[JsonProperty('top_logprobs')]
    public ?int $topLogprobs;

    /**
     * @var ?int $maxCompletionTokens Output-token cap for this request. An API key may set this above the agent's Max Output Tokens. The value cannot exceed the model's maximum. Requests without an API key keep the agent's Max Output Tokens.
     */
    #[JsonProperty('max_completion_tokens')]
    public ?int $maxCompletionTokens;

    /**
     * @var ?int $maxTokens
     */
    #[JsonProperty('max_tokens')]
    public ?int $maxTokens;

    /**
     * @var ?array<ChatMessage> $messages Chat messages in OpenAI format. Required when `prompt` is omitted.
     */
    #[JsonProperty('messages'), ArrayType([ChatMessage::class])]
    public ?array $messages;

    /**
     * @var ?ChatCompletionRequestMetadata $metadata
     */
    #[JsonProperty('metadata')]
    public ?ChatCompletionRequestMetadata $metadata;

    /**
     * @var ?array<mixed> $modalities
     */
    #[JsonProperty('modalities'), ArrayType(['mixed'])]
    public ?array $modalities;

    /**
     * @var ?string $model
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?int $n
     */
    #[JsonProperty('n')]
    public ?int $n;

    /**
     * @var ?bool $parallelToolCalls
     */
    #[JsonProperty('parallel_tool_calls')]
    public ?bool $parallelToolCalls;

    /**
     * @var ?array<string, mixed> $prediction
     */
    #[JsonProperty('prediction'), ArrayType(['string' => 'mixed'])]
    public ?array $prediction;

    /**
     * @var ?float $presencePenalty
     */
    #[JsonProperty('presence_penalty')]
    public ?float $presencePenalty;

    /**
     * @var ?string $prompt User text to complete. Required when `messages` is omitted.
     */
    #[JsonProperty('prompt')]
    public ?string $prompt;

    /**
     * @var ?value-of<ChatCompletionRequestReasoningEffort> $reasoningEffort
     */
    #[JsonProperty('reasoning_effort')]
    public ?string $reasoningEffort;

    /**
     * @var ?value-of<ChatCompletionRequestVerbosity> $verbosity
     */
    #[JsonProperty('verbosity')]
    public ?string $verbosity;

    /**
     * @var ?ChatCompletionRequestResponseFormat $responseFormat
     */
    #[JsonProperty('response_format')]
    public ?ChatCompletionRequestResponseFormat $responseFormat;

    /**
     * @var ?int $seed
     */
    #[JsonProperty('seed')]
    public ?int $seed;

    /**
     * @var ?string $serviceTier
     */
    #[JsonProperty('service_tier')]
    public ?string $serviceTier;

    /**
     * @var ?string $stop
     */
    #[JsonProperty('stop')]
    public ?string $stop;

    /**
     * @var ?bool $store
     */
    #[JsonProperty('store')]
    public ?bool $store;

    /**
     * @var ?bool $stream
     */
    #[JsonProperty('stream')]
    public ?bool $stream;

    /**
     * @var ?array<string, mixed> $streamOptions
     */
    #[JsonProperty('stream_options'), ArrayType(['string' => 'mixed'])]
    public ?array $streamOptions;

    /**
     * @var ?float $temperature
     */
    #[JsonProperty('temperature')]
    public ?float $temperature;

    /**
     * @var ?float $topP
     */
    #[JsonProperty('top_p')]
    public ?float $topP;

    /**
     * @var ?array<mixed> $tools OpenAI-compatible function tool definitions. Passed through to the model as declaration-only tools (the client executes them and returns role=tool messages).
     */
    #[JsonProperty('tools'), ArrayType(['mixed'])]
    public ?array $tools;

    /**
     * @var (
     *    value-of<ChatCompletionRequestToolChoiceZero>
     *   |array<string, mixed>
     *   |null
     * ) $toolChoice
     */
    #[JsonProperty('tool_choice'), Union('string', new Union(['string' => 'mixed'], 'null'), 'null')]
    public string|array|null $toolChoice;

    /**
     * @var ?string $user
     */
    #[JsonProperty('user')]
    public ?string $user;

    /**
     * @param array{
     *   traceparent?: ?string,
     *   tracestate?: ?string,
     *   baggage?: ?string,
     *   audio?: ?array<string, mixed>,
     *   frequencyPenalty?: ?float,
     *   logitBias?: ?array<string, mixed>,
     *   logprobs?: (
     *    bool
     *   |int
     * )|null,
     *   topLogprobs?: ?int,
     *   maxCompletionTokens?: ?int,
     *   maxTokens?: ?int,
     *   messages?: ?array<ChatMessage>,
     *   metadata?: ?ChatCompletionRequestMetadata,
     *   modalities?: ?array<mixed>,
     *   model?: ?string,
     *   n?: ?int,
     *   parallelToolCalls?: ?bool,
     *   prediction?: ?array<string, mixed>,
     *   presencePenalty?: ?float,
     *   prompt?: ?string,
     *   reasoningEffort?: ?value-of<ChatCompletionRequestReasoningEffort>,
     *   verbosity?: ?value-of<ChatCompletionRequestVerbosity>,
     *   responseFormat?: ?ChatCompletionRequestResponseFormat,
     *   seed?: ?int,
     *   serviceTier?: ?string,
     *   stop?: ?string,
     *   store?: ?bool,
     *   stream?: ?bool,
     *   streamOptions?: ?array<string, mixed>,
     *   temperature?: ?float,
     *   topP?: ?float,
     *   tools?: ?array<mixed>,
     *   toolChoice?: (
     *    value-of<ChatCompletionRequestToolChoiceZero>
     *   |array<string, mixed>
     *   |null
     * ),
     *   user?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->traceparent = $values['traceparent'] ?? null;
        $this->tracestate = $values['tracestate'] ?? null;
        $this->baggage = $values['baggage'] ?? null;
        $this->audio = $values['audio'] ?? null;
        $this->frequencyPenalty = $values['frequencyPenalty'] ?? null;
        $this->logitBias = $values['logitBias'] ?? null;
        $this->logprobs = $values['logprobs'] ?? null;
        $this->topLogprobs = $values['topLogprobs'] ?? null;
        $this->maxCompletionTokens = $values['maxCompletionTokens'] ?? null;
        $this->maxTokens = $values['maxTokens'] ?? null;
        $this->messages = $values['messages'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->modalities = $values['modalities'] ?? null;
        $this->model = $values['model'] ?? null;
        $this->n = $values['n'] ?? null;
        $this->parallelToolCalls = $values['parallelToolCalls'] ?? null;
        $this->prediction = $values['prediction'] ?? null;
        $this->presencePenalty = $values['presencePenalty'] ?? null;
        $this->prompt = $values['prompt'] ?? null;
        $this->reasoningEffort = $values['reasoningEffort'] ?? null;
        $this->verbosity = $values['verbosity'] ?? null;
        $this->responseFormat = $values['responseFormat'] ?? null;
        $this->seed = $values['seed'] ?? null;
        $this->serviceTier = $values['serviceTier'] ?? null;
        $this->stop = $values['stop'] ?? null;
        $this->store = $values['store'] ?? null;
        $this->stream = $values['stream'] ?? null;
        $this->streamOptions = $values['streamOptions'] ?? null;
        $this->temperature = $values['temperature'] ?? null;
        $this->topP = $values['topP'] ?? null;
        $this->tools = $values['tools'] ?? null;
        $this->toolChoice = $values['toolChoice'] ?? null;
        $this->user = $values['user'] ?? null;
    }
}
