<?php

namespace Sequenzy\Types;

enum WebsiteDnsRecordsReturnPathCnameStatus: string
{
    case Pending = "pending";
    case Verified = "verified";
    case Misconfigured = "misconfigured";
}
