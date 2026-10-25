<?php

namespace Sequenzy\Analytics\Types;

enum GetMetricsBreakdownRequestBy: string
{
    case Email = "email";
    case Sequence = "sequence";
    case EmailType = "email_type";
    case MailboxProvider = "mailbox_provider";
    case RecipientDomain = "recipient_domain";
}
