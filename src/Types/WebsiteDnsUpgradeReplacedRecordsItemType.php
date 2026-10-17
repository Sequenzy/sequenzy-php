<?php

namespace Sequenzy\Types;

enum WebsiteDnsUpgradeReplacedRecordsItemType: string
{
    case Txt = "TXT";
    case Mx = "MX";
    case Cname = "CNAME";
}
