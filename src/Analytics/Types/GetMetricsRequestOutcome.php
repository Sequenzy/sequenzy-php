<?php

namespace Sequenzy\Analytics\Types;

enum GetMetricsRequestOutcome: string
{
    case PermanentBounce = "permanent_bounce";
    case TemporaryBounce = "temporary_bounce";
    case Blocked = "blocked";
    case Complaint = "complaint";
}
