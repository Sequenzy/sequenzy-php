<?php

namespace Sequenzy\Types;

enum OutboundWebhookEndpointStatus: string
{
    case Enabled = "enabled";
    case Disabled = "disabled";
}
