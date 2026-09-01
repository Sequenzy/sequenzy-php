<?php

namespace Sequenzy\Types;

enum SequenceEnrollmentGetResponseEnrollmentStatus: string
{
    case Active = "active";
    case Waiting = "waiting";
    case Completed = "completed";
    case Failed = "failed";
    case Cancelled = "cancelled";
}
