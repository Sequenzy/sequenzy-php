<?php

namespace Sequenzy\Types;

enum SequenceRecurringEnrollmentResponseEnrollmentMode: string
{
    case Unlimited = "unlimited";
    case OneTime = "one_time";
    case MatchingField = "matching_field";
}
