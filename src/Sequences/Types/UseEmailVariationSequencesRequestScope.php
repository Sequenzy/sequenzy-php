<?php

namespace Sequenzy\Sequences\Types;

enum UseEmailVariationSequencesRequestScope: string
{
    case Email = "email";
    case All = "all";
}
