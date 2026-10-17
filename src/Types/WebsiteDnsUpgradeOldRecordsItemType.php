<?php

namespace Sequenzy\Types;

enum WebsiteDnsUpgradeOldRecordsItemType: string
{
    case Txt = "TXT";
    case Mx = "MX";
    case Cname = "CNAME";
}
