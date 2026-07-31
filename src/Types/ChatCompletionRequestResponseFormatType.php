<?php

namespace ApologistAi\Types;

enum ChatCompletionRequestResponseFormatType: string
{
    case Text = "text";
    case Html = "html";
    case Json = "json";
    case Raw = "raw";
    case JsonSchema = "json_schema";
}
