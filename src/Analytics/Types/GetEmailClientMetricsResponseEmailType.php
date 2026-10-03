<?php

namespace Sequenzy\Analytics\Types;

enum GetEmailClientMetricsResponseEmailType: string
{
    case Campaign = "campaign";
    case Transactional = "transactional";
    case Sequence = "sequence";
}
