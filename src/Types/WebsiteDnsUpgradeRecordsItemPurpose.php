<?php

namespace Sequenzy\Types;

enum WebsiteDnsUpgradeRecordsItemPurpose: string
{
    case Dkim = "dkim";
    case DkimSpare = "dkim_spare";
    case ReturnPath = "return_path";
    case SesReturnPath = "ses_return_path";
}
