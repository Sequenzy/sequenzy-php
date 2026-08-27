<?php

namespace Sequenzy\Campaigns\Types;

enum ScheduleCampaignsResponseCampaignStatus: string
{
    case Scheduled = "scheduled";
    case WaitingApproval = "waiting_approval";
}
