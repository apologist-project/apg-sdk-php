<?php

namespace Apologist\Types;

enum UserRedactResponseMode: string
{
    case Scrub = "scrub";
    case Anonymize = "anonymize";
}
