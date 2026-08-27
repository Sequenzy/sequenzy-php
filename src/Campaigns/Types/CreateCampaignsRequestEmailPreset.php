<?php

namespace Sequenzy\Campaigns\Types;

enum CreateCampaignsRequestEmailPreset: string
{
    case Branded = "branded";
    case Minimal = "minimal";
}
