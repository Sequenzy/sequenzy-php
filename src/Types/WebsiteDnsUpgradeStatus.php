<?php

namespace Sequenzy\Types;

enum WebsiteDnsUpgradeStatus: string
{
    case Available = "available";
    case InProgress = "in_progress";
    case Completed = "completed";
    case Unavailable = "unavailable";
}
