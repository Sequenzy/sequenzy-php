<?php

namespace Sequenzy\Types;

enum SequenceInboundWebhookStatus: string
{
    case PendingSetup = "pending_setup";
    case Active = "active";
}
