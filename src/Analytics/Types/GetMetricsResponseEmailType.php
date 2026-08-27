<?php

namespace Sequenzy\Analytics\Types;

enum GetMetricsResponseEmailType: string
{
    case Campaign = "campaign";
    case Transactional = "transactional";
    case Sequence = "sequence";
}
