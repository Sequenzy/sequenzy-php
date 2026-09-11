<?php

namespace Sequenzy\Campaigns\Types;

enum CreateForAudienceCampaignsRequestSelectionContactsRootJoinOperator: string
{
    case And_ = "and";
    case Or_ = "or";
}
