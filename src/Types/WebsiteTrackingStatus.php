<?php

namespace Sequenzy\Types;

enum WebsiteTrackingStatus: string
{
    case NotStarted = "not_started";
    case Pending = "pending";
    case Verified = "verified";
    case Failed = "failed";
}
