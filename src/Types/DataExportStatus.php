<?php

namespace Sequenzy\Types;

enum DataExportStatus: string
{
    case Idle = "idle";
    case Queued = "queued";
    case Running = "running";
    case Failed = "failed";
}
