<?php

namespace Sequenzy\Types;

enum ResolvedCampaignAudienceFilterJoinOperator: string
{
    case And_ = "and";
    case Or_ = "or";
}
