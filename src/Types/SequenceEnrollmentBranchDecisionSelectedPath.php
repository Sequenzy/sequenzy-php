<?php

namespace Sequenzy\Types;

enum SequenceEnrollmentBranchDecisionSelectedPath: string
{
    case Matched = "matched";
    case Else_ = "else";
}
