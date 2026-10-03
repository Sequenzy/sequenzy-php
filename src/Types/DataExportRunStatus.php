<?php

namespace Sequenzy\Types;

enum DataExportRunStatus: string
{
    case Running = "running";
    case Succeeded = "succeeded";
    case Failed = "failed";
}
