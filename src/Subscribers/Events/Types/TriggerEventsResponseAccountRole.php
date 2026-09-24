<?php

namespace Sequenzy\Subscribers\Events\Types;

enum TriggerEventsResponseAccountRole: string
{
    case Owner = "owner";
    case Admin = "admin";
    case Member = "member";
}
