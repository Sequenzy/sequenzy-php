<?php

namespace Sequenzy\Types;

enum SequenceEnrollmentBranchDecisionEvaluationsItemOutcome: string
{
    case Pass = "pass";
    case Fail = "fail";
    case Skip = "skip";
}
