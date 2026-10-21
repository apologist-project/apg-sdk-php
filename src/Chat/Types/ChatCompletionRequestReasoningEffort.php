<?php

namespace Apologist\Chat\Types;

enum ChatCompletionRequestReasoningEffort: string
{
    case Low = "low";
    case Medium = "medium";
    case High = "high";
}
