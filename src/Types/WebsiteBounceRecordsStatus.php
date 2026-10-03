<?php

namespace Sequenzy\Types;

enum WebsiteBounceRecordsStatus: string
{
    case Pending = "pending";
    case Verified = "verified";
    case Misconfigured = "misconfigured";
}
