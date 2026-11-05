<?php

namespace Sequenzy\Sequences\Types;

enum SetRecurringEnrollmentSequencesRequestEnrollmentMode: string
{
    case Unlimited = "unlimited";
    case OneTime = "one_time";
}
