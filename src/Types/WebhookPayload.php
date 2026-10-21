<?php

namespace Apologist\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Core\Types\ArrayType;

/**
 * Canonical JSON body POSTed to a configured webhook URL. `notification`, `event`, and `agent` are always present; `trace` is present when the event ran inside an instrumented API request. The remaining sections appear only when relevant to the event. Treat the payload as additive and ignore unrecognised fields.
 */
class WebhookPayload extends JsonSerializableType
{
    /**
     * @var WebhookNotificationRef $notification
     */
    #[JsonProperty('notification')]
    public WebhookNotificationRef $notification;

    /**
     * @var WebhookEventInfo $event
     */
    #[JsonProperty('event')]
    public WebhookEventInfo $event;

    /**
     * @var WebhookAgentRef $agent
     */
    #[JsonProperty('agent')]
    public WebhookAgentRef $agent;

    /**
     * @var ?array<string, mixed> $completion Present when the event is tied to a prompt. Includes the prompt and response plus `automations` and `tags` arrays. Shape mirrors the prompt API object.
     */
    #[JsonProperty('completion'), ArrayType(['string' => 'mixed'])]
    public ?array $completion;

    /**
     * @var ?WebhookNamedRef $channel Present when the prompt arrived via a channel.
     */
    #[JsonProperty('channel')]
    public ?WebhookNamedRef $channel;

    /**
     * @var ?WebhookNamedRef $platform Present alongside `channel` when the channel has a platform.
     */
    #[JsonProperty('platform')]
    public ?WebhookNamedRef $platform;

    /**
     * @var ?WebhookCta $cta Present for cta_trigger and cta_click events.
     */
    #[JsonProperty('cta')]
    public ?WebhookCta $cta;

    /**
     * @var ?WebhookNamedRef $guardrail Present for guardrail_trigger events.
     */
    #[JsonProperty('guardrail')]
    public ?WebhookNamedRef $guardrail;

    /**
     * @var ?WebhookNamedRef $automation Present for automation_trigger events.
     */
    #[JsonProperty('automation')]
    public ?WebhookNamedRef $automation;

    /**
     * @var ?WebhookNamedRef $evaluator Present for CTA, guardrail, or automation events that ran an evaluation.
     */
    #[JsonProperty('evaluator')]
    public ?WebhookNamedRef $evaluator;

    /**
     * @var ?WebhookEvaluation $evaluation
     */
    #[JsonProperty('evaluation')]
    public ?WebhookEvaluation $evaluation;

    /**
     * @var ?WebhookPayloadTrace $trace OpenTelemetry context for the API request that produced this event. Present when the Agent created or continued a W3C trace.
     */
    #[JsonProperty('trace')]
    public ?WebhookPayloadTrace $trace;

    /**
     * @param array{
     *   notification: WebhookNotificationRef,
     *   event: WebhookEventInfo,
     *   agent: WebhookAgentRef,
     *   completion?: ?array<string, mixed>,
     *   channel?: ?WebhookNamedRef,
     *   platform?: ?WebhookNamedRef,
     *   cta?: ?WebhookCta,
     *   guardrail?: ?WebhookNamedRef,
     *   automation?: ?WebhookNamedRef,
     *   evaluator?: ?WebhookNamedRef,
     *   evaluation?: ?WebhookEvaluation,
     *   trace?: ?WebhookPayloadTrace,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->notification = $values['notification'];
        $this->event = $values['event'];
        $this->agent = $values['agent'];
        $this->completion = $values['completion'] ?? null;
        $this->channel = $values['channel'] ?? null;
        $this->platform = $values['platform'] ?? null;
        $this->cta = $values['cta'] ?? null;
        $this->guardrail = $values['guardrail'] ?? null;
        $this->automation = $values['automation'] ?? null;
        $this->evaluator = $values['evaluator'] ?? null;
        $this->evaluation = $values['evaluation'] ?? null;
        $this->trace = $values['trace'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
