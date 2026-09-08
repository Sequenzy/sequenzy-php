<?php

namespace Sequenzy\Types;

enum SubscriberOperationStatus: string
{
    case Queued = "queued";
    case Running = "running";
    case Completed = "completed";
    case Failed = "failed";
    case Cancelled = "cancelled";
}
