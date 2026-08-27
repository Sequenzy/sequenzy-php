<?php

namespace Sequenzy\Analytics\Types;

enum ListEmailMetricsResponseEmailType: string
{
    case Campaign = "campaign";
    case Sequence = "sequence";
}
