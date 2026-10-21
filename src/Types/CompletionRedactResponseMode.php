<?php

namespace Apologist\Types;

enum CompletionRedactResponseMode: string
{
    case Scrub = "scrub";
    case Anonymize = "anonymize";
}
