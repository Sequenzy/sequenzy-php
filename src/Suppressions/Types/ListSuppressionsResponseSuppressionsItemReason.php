<?php

namespace Sequenzy\Suppressions\Types;

enum ListSuppressionsResponseSuppressionsItemReason: string
{
    case Bounced = "bounced";
    case Complaint = "complaint";
}
