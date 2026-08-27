<?php

namespace Sequenzy\Types;

enum SendingStatusSelfResumeAiReviewStatus: string
{
    case NotRequired = "not_required";
    case Pending = "pending";
    case Approved = "approved";
    case Flagged = "flagged";
    case Failed = "failed";
}
