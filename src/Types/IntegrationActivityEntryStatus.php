<?php

namespace Sequenzy\Types;

enum IntegrationActivityEntryStatus: string
{
    case Received = "received";
    case Queued = "queued";
    case Processed = "processed";
    case Skipped = "skipped";
    case Failed = "failed";
}
