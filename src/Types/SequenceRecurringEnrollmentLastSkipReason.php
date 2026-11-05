<?php

namespace Sequenzy\Types;

enum SequenceRecurringEnrollmentLastSkipReason: string
{
    case NotAccepting = "not_accepting";
    case Missed = "missed";
}
