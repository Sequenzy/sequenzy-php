<?php

namespace Sequenzy\Types;

enum EngagementStatsRateDenominatorBasis: string
{
    case Delivered = "delivered";
    case Sent = "sent";
    case None = "none";
}
