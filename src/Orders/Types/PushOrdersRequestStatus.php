<?php

namespace Sequenzy\Orders\Types;

enum PushOrdersRequestStatus: string
{
    case Placed = "placed";
    case Cancelled = "cancelled";
    case Fulfilled = "fulfilled";
    case Refunded = "refunded";
}
