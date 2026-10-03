<?php

namespace Sequenzy\Push\Types;

enum EstimatePushCampaignRecipientsRequestPlatformsItem: string
{
    case Web = "web";
    case Ios = "ios";
    case Android = "android";
}
