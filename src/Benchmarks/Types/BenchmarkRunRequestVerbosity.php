<?php

namespace Apologist\Benchmarks\Types;

enum BenchmarkRunRequestVerbosity: string
{
    case Minimal = "minimal";
    case Low = "low";
    case Medium = "medium";
    case High = "high";
}
