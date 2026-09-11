<?php

namespace Sequenzy\Campaigns\Types;

enum CreateForAudienceCampaignsRequestSelectionActivityEventType: string
{
    case Send = "send";
    case Delivery = "delivery";
    case Open = "open";
    case Click = "click";
    case Bounce = "bounce";
    case Unsubscribe = "unsubscribe";
}
