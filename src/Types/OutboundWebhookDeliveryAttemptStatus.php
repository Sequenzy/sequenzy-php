<?php

namespace Sequenzy\Types;

enum OutboundWebhookDeliveryAttemptStatus: string
{
    case Succeeded = "succeeded";
    case Failed = "failed";
}
