<?php

namespace Sequenzy\Analytics\Types;

enum GetSequenceMetricsResponseBranchesItemNodeType: string
{
    case LogicBranch = "logic_branch";
    case LogicCondition = "logic_condition";
}
