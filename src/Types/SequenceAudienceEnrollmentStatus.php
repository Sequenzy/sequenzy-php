<?php

namespace Sequenzy\Types;

enum SequenceAudienceEnrollmentStatus: string
{
    case Queued = "queued";
    case Running = "running";
    case Completed = "completed";
    case Cancelled = "cancelled";
    case Failed = "failed";
}
