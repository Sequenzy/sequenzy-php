<?php

namespace Sequenzy\Types;

enum SequenceTestRunResponseRunStatus: string
{
    case Queued = "queued";
    case Running = "running";
    case Completed = "completed";
    case Failed = "failed";
}
