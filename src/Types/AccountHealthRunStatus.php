<?php

namespace Sequenzy\Types;

enum AccountHealthRunStatus: string
{
    case Queued = "queued";
    case Running = "running";
    case Completed = "completed";
    case Failed = "failed";
    case Skipped = "skipped";
}
