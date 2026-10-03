<?php

namespace Sequenzy\Types;

enum WarehouseSyncStatus: string
{
    case Idle = "idle";
    case Queued = "queued";
    case Running = "running";
    case Failed = "failed";
}
