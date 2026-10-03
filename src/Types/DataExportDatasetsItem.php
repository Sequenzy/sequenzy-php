<?php

namespace Sequenzy\Types;

enum DataExportDatasetsItem: string
{
    case EmailEvents = "email_events";
    case SmsEvents = "sms_events";
    case CustomEvents = "custom_events";
    case Subscribers = "subscribers";
}
