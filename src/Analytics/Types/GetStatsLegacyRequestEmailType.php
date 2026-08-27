<?php

namespace Sequenzy\Analytics\Types;

enum GetStatsLegacyRequestEmailType: string
{
    case Campaign = "campaign";
    case Transactional = "transactional";
    case Sequence = "sequence";
}
