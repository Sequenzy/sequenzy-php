<?php

namespace Sequenzy\Analytics\Types;

enum GetEmailClientMetricsRequestEmailType: string
{
    case Campaign = "campaign";
    case Transactional = "transactional";
    case Sequence = "sequence";
}
