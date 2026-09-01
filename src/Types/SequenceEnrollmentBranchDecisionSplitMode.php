<?php

namespace Sequenzy\Types;

enum SequenceEnrollmentBranchDecisionSplitMode: string
{
    case Condition = "condition";
    case Random = "random";
}
