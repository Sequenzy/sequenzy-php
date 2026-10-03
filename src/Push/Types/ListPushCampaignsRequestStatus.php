<?php

namespace Sequenzy\Push\Types;

enum ListPushCampaignsRequestStatus: string
{
    case Draft = "draft";
    case Scheduled = "scheduled";
    case Sending = "sending";
    case Sent = "sent";
    case Cancelled = "cancelled";
}
