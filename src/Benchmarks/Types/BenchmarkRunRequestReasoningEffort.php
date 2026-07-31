<?php

namespace ApologistAi\Benchmarks\Types;

enum BenchmarkRunRequestReasoningEffort: string
{
    case Low = "low";
    case Medium = "medium";
    case High = "high";
}
