<?php

namespace Sequenzy\InApp\Types;

enum GetInAppCampaignStatsResponseStatus: string
{
    case Draft = "draft";
    case Scheduled = "scheduled";
    case Sent = "sent";
    case Cancelled = "cancelled";
}
