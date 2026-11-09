<?php

namespace Sequenzy\Types;

enum InAppCampaignState: string
{
    case Draft = "draft";
    case Scheduled = "scheduled";
    case Live = "live";
    case Ended = "ended";
    case Stopped = "stopped";
}
