<?php

namespace Sequenzy\Types;

enum AccountHealthRunSkippedReason: string
{
    case BelowSubscriberMinimum = "below_subscriber_minimum";
    case NoRecentSends = "no_recent_sends";
    case Disabled = "disabled";
}
