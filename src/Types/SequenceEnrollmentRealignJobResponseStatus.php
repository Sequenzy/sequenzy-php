<?php

namespace Sequenzy\Types;

enum SequenceEnrollmentRealignJobResponseStatus: string
{
    case Queued = "queued";
    case Running = "running";
    case Completed = "completed";
    case Failed = "failed";
}
