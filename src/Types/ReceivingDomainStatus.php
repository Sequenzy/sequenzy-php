<?php

namespace Sequenzy\Types;

enum ReceivingDomainStatus: string
{
    case Pending = "pending";
    case Verified = "verified";
    case Failed = "failed";
}
