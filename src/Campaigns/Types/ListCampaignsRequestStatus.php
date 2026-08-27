<?php

namespace Sequenzy\Campaigns\Types;

enum ListCampaignsRequestStatus: string
{
    case Draft = "draft";
    case Scheduled = "scheduled";
    case Sent = "sent";
    case Sending = "sending";
    case Cancelled = "cancelled";
    case Paused = "paused";
    case WaitingApproval = "waiting_approval";
    case Rejected = "rejected";
}
