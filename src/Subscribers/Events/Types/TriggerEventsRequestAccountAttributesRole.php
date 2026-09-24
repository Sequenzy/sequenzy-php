<?php

namespace Sequenzy\Subscribers\Events\Types;

enum TriggerEventsRequestAccountAttributesRole: string
{
    case Owner = "owner";
    case Admin = "admin";
    case Member = "member";
}
