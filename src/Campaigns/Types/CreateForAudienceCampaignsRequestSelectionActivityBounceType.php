<?php

namespace Sequenzy\Campaigns\Types;

enum CreateForAudienceCampaignsRequestSelectionActivityBounceType: string
{
    case Permanent = "Permanent";
    case Transient = "Transient";
    case Soft = "Soft";
    case Blocked = "Blocked";
}
