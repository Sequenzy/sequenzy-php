<?php

namespace Sequenzy\Accounts\Types;

enum TriggerEventAccountsResponseRecipients: string
{
    case Owners = "owners";
    case Admins = "admins";
    case All = "all";
    case None = "none";
}
