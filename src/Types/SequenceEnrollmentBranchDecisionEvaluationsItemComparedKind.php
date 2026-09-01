<?php

namespace Sequenzy\Types;

enum SequenceEnrollmentBranchDecisionEvaluationsItemComparedKind: string
{
    case String = "string";
    case Number = "number";
    case Boolean = "boolean";
    case Object = "object";
    case Array = "array";
    case Null = "null";
}
