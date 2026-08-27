<?php

namespace Sequenzy\Types;

enum IntegrationSyncSkipSummaryRecordsItemOutcome: string
{
    case Suppressed = "suppressed";
    case Skipped = "skipped";
}
