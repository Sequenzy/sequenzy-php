<?php

namespace Sequenzy\Types;

enum WarehouseSyncRunStatus: string
{
    case Running = "running";
    case Succeeded = "succeeded";
    case Failed = "failed";
}
