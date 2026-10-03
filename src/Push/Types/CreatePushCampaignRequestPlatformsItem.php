<?php

namespace Sequenzy\Push\Types;

enum CreatePushCampaignRequestPlatformsItem: string
{
    case Web = "web";
    case Ios = "ios";
    case Android = "android";
}
