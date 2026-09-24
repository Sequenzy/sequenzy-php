<?php

namespace Sequenzy\Accounts\Types;

enum TriggerEventAccountsResponseDeliveriesItemRole: string
{
    case Owner = "owner";
    case Admin = "admin";
    case Member = "member";
}
