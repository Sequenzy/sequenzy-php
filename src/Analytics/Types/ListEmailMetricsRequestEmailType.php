<?php

namespace Sequenzy\Analytics\Types;

enum ListEmailMetricsRequestEmailType: string
{
    case Campaign = "campaign";
    case Sequence = "sequence";
}
