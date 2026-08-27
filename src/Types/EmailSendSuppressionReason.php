<?php

namespace Sequenzy\Types;

enum EmailSendSuppressionReason: string
{
    case Bounced = "bounced";
    case Complaint = "complaint";
    case Unsubscribed = "unsubscribed";
}
