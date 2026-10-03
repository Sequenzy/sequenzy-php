<?php

namespace Sequenzy\Sequences\Types;

enum CreateFromExampleSequencesResponseSequenceEnrichmentStatus: string
{
    case Processing = "processing";
    case NotQueued = "not_queued";
}
