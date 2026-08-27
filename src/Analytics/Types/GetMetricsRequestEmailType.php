<?php

namespace Sequenzy\Analytics\Types;

enum GetMetricsRequestEmailType: string
{
    case Campaign = "campaign";
    case Transactional = "transactional";
    case Sequence = "sequence";
}
