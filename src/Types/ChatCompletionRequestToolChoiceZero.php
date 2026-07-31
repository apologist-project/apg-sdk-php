<?php

namespace Apologist\Types;

enum ChatCompletionRequestToolChoiceZero: string
{
    case None = "none";
    case Auto = "auto";
    case Required = "required";
}
