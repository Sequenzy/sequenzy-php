<?php

namespace Sequenzy\Types;

enum WebsiteDnsRecordsPlatformDnsRecordsItemStatus: string
{
    case Pending = "pending";
    case Verified = "verified";
    case Misconfigured = "misconfigured";
}
