<?php

namespace Sequenzy\Analytics\Types;

enum GetSequenceMetricsResponseBranchesItemSplitMode: string
{
    case Condition = "condition";
    case Random = "random";
}
