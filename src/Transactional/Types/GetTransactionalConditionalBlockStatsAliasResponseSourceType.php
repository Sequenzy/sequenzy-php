<?php

namespace Sequenzy\Transactional\Types;

enum GetTransactionalConditionalBlockStatsAliasResponseSourceType: string
{
    case Campaign = "campaign";
    case SequenceStep = "sequence_step";
    case Transactional = "transactional";
}
