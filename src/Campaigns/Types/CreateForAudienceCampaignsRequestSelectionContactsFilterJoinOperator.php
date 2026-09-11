<?php

namespace Sequenzy\Campaigns\Types;

enum CreateForAudienceCampaignsRequestSelectionContactsFilterJoinOperator: string
{
    case And_ = "and";
    case Or_ = "or";
}
