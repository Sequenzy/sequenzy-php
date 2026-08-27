<?php

namespace Sequenzy\EmailSends\Types;

enum ListEmailSendsRequestSortField: string
{
    case RecipientEmail = "recipientEmail";
    case Subject = "subject";
    case Status = "status";
    case EventAt = "eventAt";
    case SentAt = "sentAt";
    case CreatedAt = "createdAt";
}
