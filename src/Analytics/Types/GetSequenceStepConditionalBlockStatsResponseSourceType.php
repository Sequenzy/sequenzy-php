<?php

namespace Sequenzy\Analytics\Types;

enum GetSequenceStepConditionalBlockStatsResponseSourceType: string
{
    case Campaign = "campaign";
    case SequenceStep = "sequence_step";
    case Transactional = "transactional";
}
