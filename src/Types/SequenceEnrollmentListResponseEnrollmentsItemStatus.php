<?php

namespace Sequenzy\Types;

enum SequenceEnrollmentListResponseEnrollmentsItemStatus: string
{
    case Active = "active";
    case Waiting = "waiting";
    case Paused = "paused";
    case Completed = "completed";
    case Failed = "failed";
    case Cancelled = "cancelled";
}
