<?php

namespace ApologistAi\Evaluators\Types;

enum EvaluatorRequestReasoningEffort: string
{
    case Low = "low";
    case Medium = "medium";
    case High = "high";
}
