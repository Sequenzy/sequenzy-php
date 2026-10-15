<?php

namespace Sequenzy\Analytics\Types;

enum GetLinkClickMetricsResponseEmailType: string
{
    case Campaign = "campaign";
    case Transactional = "transactional";
    case Sequence = "sequence";
}
