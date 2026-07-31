<?php

namespace Apologist\Types;

enum ChatMessageRole: string
{
    case System = "system";
    case User = "user";
    case Assistant = "assistant";
}
