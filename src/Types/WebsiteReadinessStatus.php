<?php

namespace Sequenzy\Types;

enum WebsiteReadinessStatus: string
{
    case SetupRequired = "setup_required";
    case VerifyingDns = "verifying_dns";
    case Activating = "activating";
    case Ready = "ready";
    case Blocked = "blocked";
}
