<?php

namespace Sequenzy\Types;

enum WebsiteDnsRecordsInboundRoutingStatus: string
{
    case Pending = "pending";
    case Active = "active";
    case Failed = "failed";
}
