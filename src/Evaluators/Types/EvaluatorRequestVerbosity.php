<?php

namespace Apologist\Evaluators\Types;

enum EvaluatorRequestVerbosity: string
{
    case Minimal = "minimal";
    case Low = "low";
    case Medium = "medium";
    case High = "high";
}
