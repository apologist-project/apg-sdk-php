<?php

namespace Apologist\Types;

enum ChatCompletionRequestReasoningEffort: string
{
    case Low = "low";
    case Medium = "medium";
    case High = "high";
}
