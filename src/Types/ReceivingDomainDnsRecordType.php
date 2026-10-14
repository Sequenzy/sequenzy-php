<?php

namespace Sequenzy\Types;

enum ReceivingDomainDnsRecordType: string
{
    case Mx = "MX";
    case Txt = "TXT";
}
