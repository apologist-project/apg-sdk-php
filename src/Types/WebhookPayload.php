<?php

namespace Apologist\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;
use Apologist\Core\Types\ArrayType;

/**
 * Canonical JSON body POSTed to a configured webhook URL. `notification`, `event`, and `agent` are always present; the remaining sections appear only when relevant to the event. Treat the payload as additive and ignore unrecognised fields.
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
     * @var ?WebhookNamedRef $evaluator Present for CTA/guardrail events that ran an evaluation.
     */
    #[JsonProperty('evaluator')]
    public ?WebhookNamedRef $evaluator;

    /**
     * @var ?WebhookEvaluation $evaluation
     */
    #[JsonProperty('evaluation')]
    public ?WebhookEvaluation $evaluation;

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
     *   evaluator?: ?WebhookNamedRef,
     *   evaluation?: ?WebhookEvaluation,
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
        $this->evaluator = $values['evaluator'] ?? null;
        $this->evaluation = $values['evaluation'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
