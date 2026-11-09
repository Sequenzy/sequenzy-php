<?php

namespace Sequenzy\InApp\Types;

enum ListInAppCampaignsRequestStatus: string
{
    case Draft = "draft";
    case Scheduled = "scheduled";
    case Sent = "sent";
    case Cancelled = "cancelled";
}
