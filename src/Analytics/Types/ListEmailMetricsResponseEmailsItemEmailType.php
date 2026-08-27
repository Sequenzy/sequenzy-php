<?php

namespace Sequenzy\Analytics\Types;

enum ListEmailMetricsResponseEmailsItemEmailType: string
{
    case Campaign = "campaign";
    case Sequence = "sequence";
}
