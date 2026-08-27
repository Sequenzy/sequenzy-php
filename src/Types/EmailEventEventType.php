<?php

namespace Sequenzy\Types;

enum EmailEventEventType: string
{
    case Send = "send";
    case Delivery = "delivery";
    case Bounce = "bounce";
    case Complaint = "complaint";
    case Open = "open";
    case Click = "click";
    case Unsubscribe = "unsubscribe";
    case DeliveryDelay = "delivery_delay";
    case TransportFailure = "transport_failure";
}
