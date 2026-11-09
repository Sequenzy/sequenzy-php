<?php

namespace Sequenzy\InApp\Types;

enum UpdateInAppCampaignRequestPriority: string
{
    case Low = "low";
    case Medium = "medium";
    case High = "high";
}
