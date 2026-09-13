<?php

namespace Sequenzy\Integrations\Types;

enum ConnectIntegrationsResponseWebhookProvisioning: string
{
    case Managed = "managed";
    case Manual = "manual";
}
