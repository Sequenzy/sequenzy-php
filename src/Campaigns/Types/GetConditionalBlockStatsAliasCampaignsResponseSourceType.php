<?php

namespace Sequenzy\Campaigns\Types;

enum GetConditionalBlockStatsAliasCampaignsResponseSourceType: string
{
    case Campaign = "campaign";
    case SequenceStep = "sequence_step";
    case Transactional = "transactional";
}
