<?php

namespace Sequenzy\Analytics\Types;

enum GetMetricsBreakdownRequestEmailType: string
{
    case Campaign = "campaign";
    case Transactional = "transactional";
    case Sequence = "sequence";
}
