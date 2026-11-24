<?php

namespace Sequenzy\Sequences\Types;

enum GetStepConditionalBlockStatsAliasSequencesResponseSourceType: string
{
    case Campaign = "campaign";
    case SequenceStep = "sequence_step";
    case Transactional = "transactional";
}
