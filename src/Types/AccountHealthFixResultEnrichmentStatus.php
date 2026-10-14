<?php

namespace Sequenzy\Types;

enum AccountHealthFixResultEnrichmentStatus: string
{
    case Processing = "processing";
    case NotQueued = "not_queued";
}
