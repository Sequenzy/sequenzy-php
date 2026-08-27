<?php

namespace Sequenzy\Campaigns\Types;

enum CreateCampaignsRequestStatus: string
{
    case Draft = "draft";
    case Sent = "sent";
}
