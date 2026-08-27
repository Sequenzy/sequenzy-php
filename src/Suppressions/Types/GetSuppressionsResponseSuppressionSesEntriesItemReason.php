<?php

namespace Sequenzy\Suppressions\Types;

enum GetSuppressionsResponseSuppressionSesEntriesItemReason: string
{
    case Bounce = "BOUNCE";
    case Complaint = "COMPLAINT";
}
