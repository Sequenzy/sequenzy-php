<?php

namespace Sequenzy\InApp\Types;

enum CreateInAppCampaignRequestPriority: string
{
    case Low = "low";
    case Medium = "medium";
    case High = "high";
}
