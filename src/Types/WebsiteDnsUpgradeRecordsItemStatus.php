<?php

namespace Sequenzy\Types;

enum WebsiteDnsUpgradeRecordsItemStatus: string
{
    case Pending = "pending";
    case Verified = "verified";
    case Misconfigured = "misconfigured";
}
