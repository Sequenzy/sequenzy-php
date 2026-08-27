<?php

namespace Sequenzy\Webhooks\Types;

enum UpdateWebhooksRequestStatus: string
{
    case Enabled = "enabled";
    case Disabled = "disabled";
}
