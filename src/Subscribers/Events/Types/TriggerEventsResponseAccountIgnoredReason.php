<?php

namespace Sequenzy\Subscribers\Events\Types;

enum TriggerEventsResponseAccountIgnoredReason: string
{
    case AccountsNotEnabled = "accounts_not_enabled";
}
