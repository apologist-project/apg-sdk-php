<?php

namespace ApologistAi\Types;

enum WebhookEventInfoKey: string
{
    case PromptSubmit = "prompt_submit";
    case ResponseStart = "response_start";
    case ResponseEnd = "response_end";
    case AutomationsEnd = "automations_end";
    case ResponseLike = "response_like";
    case ResponseFlag = "response_flag";
    case ResponseFeedback = "response_feedback";
    case ReferralClick = "referral_click";
    case CtaTrigger = "cta_trigger";
    case CtaClick = "cta_click";
    case GuardrailTrigger = "guardrail_trigger";
    case AttributionClick = "attribution_click";
    case FooterClick = "footer_click";
    case NewUser = "new_user";
    case NewDevice = "new_device";
    case NewSession = "new_session";
    case NewConversation = "new_conversation";
    case Error = "error";
}
