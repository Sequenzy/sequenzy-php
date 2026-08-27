<?php

namespace Sequenzy\Campaigns\Types;

enum ScheduleCampaignsRequestRecurringInterval: string
{
    case Weekly = "weekly";
    case Monthly = "monthly";
}
