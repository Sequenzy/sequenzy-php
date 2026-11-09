<?php

namespace Sequenzy\Types;

enum InAppCampaignStatus: string
{
    case Draft = "draft";
    case Scheduled = "scheduled";
    case Sent = "sent";
    case Cancelled = "cancelled";
}
