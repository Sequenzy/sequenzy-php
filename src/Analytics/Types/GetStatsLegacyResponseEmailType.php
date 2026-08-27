<?php

namespace Sequenzy\Analytics\Types;

enum GetStatsLegacyResponseEmailType: string
{
    case Campaign = "campaign";
    case Transactional = "transactional";
    case Sequence = "sequence";
}
