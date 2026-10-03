<?php

namespace Sequenzy\Types;

enum PushCampaignStatus: string
{
    case Draft = "draft";
    case Scheduled = "scheduled";
    case Sending = "sending";
    case Sent = "sent";
    case Cancelled = "cancelled";
}
