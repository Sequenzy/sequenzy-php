<?php

namespace Sequenzy\Analytics\Types;

enum GetCampaignConditionalBlockStatsResponseSourceType: string
{
    case Campaign = "campaign";
    case SequenceStep = "sequence_step";
    case Transactional = "transactional";
}
