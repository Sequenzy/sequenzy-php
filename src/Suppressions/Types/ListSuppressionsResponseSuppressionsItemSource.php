<?php

namespace Sequenzy\Suppressions\Types;

enum ListSuppressionsResponseSuppressionsItemSource: string
{
    case BouncedEmail = "bounced_email";
    case EmailSendComplaint = "email_send_complaint";
}
