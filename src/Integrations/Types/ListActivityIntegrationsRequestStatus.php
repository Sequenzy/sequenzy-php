<?php

namespace Sequenzy\Integrations\Types;

enum ListActivityIntegrationsRequestStatus: string
{
    case Received = "received";
    case Queued = "queued";
    case Processed = "processed";
    case Skipped = "skipped";
    case Failed = "failed";
}
