<?php

namespace Sequenzy\Campaigns\Types;

enum UpdateCampaignsRequestEmailPreset: string
{
    case Branded = "branded";
    case Minimal = "minimal";
}
