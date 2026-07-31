<?php

namespace ApologistAi\Types;

enum ChatCompletionRequestVerbosity: string
{
    case Minimal = "minimal";
    case Low = "low";
    case Medium = "medium";
    case High = "high";
}
