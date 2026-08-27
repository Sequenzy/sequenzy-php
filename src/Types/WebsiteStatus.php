<?php

namespace Sequenzy\Types;

enum WebsiteStatus: string
{
    case NotStarted = "not_started";
    case Pending = "pending";
    case Verified = "verified";
    case Failed = "failed";
    case Misconfigured = "misconfigured";
}
