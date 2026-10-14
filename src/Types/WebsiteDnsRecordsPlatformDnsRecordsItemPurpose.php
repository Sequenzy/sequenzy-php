<?php

namespace Sequenzy\Types;

enum WebsiteDnsRecordsPlatformDnsRecordsItemPurpose: string
{
    case Dkim = "dkim";
    case DkimSpare = "dkim_spare";
    case SesReturnPath = "ses_return_path";
}
