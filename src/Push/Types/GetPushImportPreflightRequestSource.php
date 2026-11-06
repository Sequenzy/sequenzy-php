<?php

namespace Sequenzy\Push\Types;

enum GetPushImportPreflightRequestSource: string
{
    case Onesignal = "onesignal";
    case Braze = "braze";
    case CustomerIo = "customer_io";
    case Csv = "csv";
}
