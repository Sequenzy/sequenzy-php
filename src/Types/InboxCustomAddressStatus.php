<?php

namespace Sequenzy\Types;

enum InboxCustomAddressStatus: string
{
    case Active = "active";
    case Pending = "pending";
}
