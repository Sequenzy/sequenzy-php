<?php

namespace Sequenzy\Analytics\Types;

enum GetTransactionalConditionalBlockStatsResponseSourceType: string
{
    case Campaign = "campaign";
    case SequenceStep = "sequence_step";
    case Transactional = "transactional";
}
