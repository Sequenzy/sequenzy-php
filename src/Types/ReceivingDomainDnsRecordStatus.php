<?php

namespace Sequenzy\Types;

enum ReceivingDomainDnsRecordStatus: string
{
    case Pending = "pending";
    case Verified = "verified";
    case Misconfigured = "misconfigured";
}
