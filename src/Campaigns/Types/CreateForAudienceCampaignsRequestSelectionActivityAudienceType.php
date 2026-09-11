<?php

namespace Sequenzy\Campaigns\Types;

enum CreateForAudienceCampaignsRequestSelectionActivityAudienceType: string
{
    case List_ = "list";
    case Segment = "segment";
}
