<?php

namespace Sequenzy\Types;

enum CampaignStatus: string
{
    case Draft = "draft";
    case Scheduled = "scheduled";
    case WaitingApproval = "waiting_approval";
    case Rejected = "rejected";
    case Sending = "sending";
    case Paused = "paused";
    case Sent = "sent";
    case Cancelled = "cancelled";
}
