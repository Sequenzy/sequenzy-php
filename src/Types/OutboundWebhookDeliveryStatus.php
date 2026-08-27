<?php

namespace Sequenzy\Types;

enum OutboundWebhookDeliveryStatus: string
{
    case Pending = "pending";
    case Delivering = "delivering";
    case Succeeded = "succeeded";
    case Failed = "failed";
    case Skipped = "skipped";
}
