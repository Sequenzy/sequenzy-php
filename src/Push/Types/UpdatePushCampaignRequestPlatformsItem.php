<?php

namespace Sequenzy\Push\Types;

enum UpdatePushCampaignRequestPlatformsItem: string
{
    case Web = "web";
    case Ios = "ios";
    case Android = "android";
}
