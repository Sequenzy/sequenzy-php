<?php

namespace Sequenzy\Analytics\Types;

enum GetLinkClickMetricsRequestEmailType: string
{
    case Campaign = "campaign";
    case Transactional = "transactional";
    case Sequence = "sequence";
}
