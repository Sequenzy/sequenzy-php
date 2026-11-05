<?php

namespace Sequenzy\Sequences\Types;

enum CreateFromTemplateSequencesResponseSequenceEnrichmentStatus: string
{
    case Processing = "processing";
    case NotNeeded = "not_needed";
}
