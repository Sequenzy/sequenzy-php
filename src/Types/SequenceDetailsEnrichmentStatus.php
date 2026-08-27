<?php

namespace Sequenzy\Types;

enum SequenceDetailsEnrichmentStatus: string
{
    case Pending = "pending";
    case InProgress = "in_progress";
    case Complete = "complete";
}
