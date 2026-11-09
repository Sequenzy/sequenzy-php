<?php

namespace Sequenzy\InApp\Types;

enum GetInAppCampaignStatsResponseState: string
{
    case Draft = "draft";
    case Scheduled = "scheduled";
    case Live = "live";
    case Ended = "ended";
    case Stopped = "stopped";
}
