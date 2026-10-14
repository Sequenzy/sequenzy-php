<?php

namespace Sequenzy\Types;

enum AccountHealthRunTrigger: string
{
    case Scheduled = "scheduled";
    case Manual = "manual";
}
