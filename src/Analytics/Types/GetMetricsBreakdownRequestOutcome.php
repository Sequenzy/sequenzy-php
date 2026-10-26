<?php

namespace Sequenzy\Analytics\Types;

enum GetMetricsBreakdownRequestOutcome: string
{
    case PermanentBounce = "permanent_bounce";
    case TemporaryBounce = "temporary_bounce";
    case Blocked = "blocked";
    case Complaint = "complaint";
}
