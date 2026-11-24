<?php

namespace Sequenzy\Analytics\Types;

enum GetSequenceMetricsResponseBranchesItemPathsItemKind: string
{
    case Rule = "rule";
    case Else_ = "else";
    case Variant = "variant";
    case Continued = "continued";
    case Exited = "exited";
}
