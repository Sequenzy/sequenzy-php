<?php

namespace Sequenzy\Types;

enum SendingStatusSenderHealthEnforcementMode: string
{
    case Enforce = "enforce";
    case MonitorOnly = "monitor_only";
}
