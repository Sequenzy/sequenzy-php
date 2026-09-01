<?php

namespace Sequenzy\Types;

enum SequenceEnrollmentBranchDecisionEvaluationsItemComparedSummary: string
{
    case Missing = "missing";
    case Empty = "empty";
    case Nonempty = "nonempty";
    case EqualsExpected = "equals_expected";
}
