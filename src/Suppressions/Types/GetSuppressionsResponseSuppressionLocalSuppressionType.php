<?php

namespace Sequenzy\Suppressions\Types;

enum GetSuppressionsResponseSuppressionLocalSuppressionType: string
{
    case InvalidRecipient = "invalid_recipient";
    case UnknownHardBounce = "unknown_hard_bounce";
    case SoftBounceEscalation = "soft_bounce_escalation";
    case Complaint = "complaint";
}
