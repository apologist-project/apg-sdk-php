<?php

namespace ApologistAi\Types;

enum ChatCompletionRequestReasoningEffort: string
{
    case Low = "low";
    case Medium = "medium";
    case High = "high";
}
