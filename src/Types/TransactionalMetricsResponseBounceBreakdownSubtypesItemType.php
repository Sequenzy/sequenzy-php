<?php

namespace Sequenzy\Types;

enum TransactionalMetricsResponseBounceBreakdownSubtypesItemType: string
{
    case Permanent = "Permanent";
    case Transient = "Transient";
    case Undetermined = "Undetermined";
}
