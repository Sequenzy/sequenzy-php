<?php

namespace Sequenzy\Types;

enum TrackingDomainStatus: string
{
    case NotStarted = "not_started";
    case Pending = "pending";
    case Verified = "verified";
    case Failed = "failed";
}
