<?php

namespace Sequenzy\Types;

enum WebsiteDnsRecordsInboundVerificationStatus: string
{
    case Pending = "pending";
    case Verified = "verified";
    case Misconfigured = "misconfigured";
}
