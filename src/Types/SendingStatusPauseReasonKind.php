<?php

namespace Sequenzy\Types;

enum SendingStatusPauseReasonKind: string
{
    case HighHardBounceRate = "high_hard_bounce_rate";
    case HighSoftBounceRate = "high_soft_bounce_rate";
    case HighComplaintRate = "high_complaint_rate";
    case PhishingGuard = "phishing_guard";
    case Manual = "manual";
    case Other = "other";
}
