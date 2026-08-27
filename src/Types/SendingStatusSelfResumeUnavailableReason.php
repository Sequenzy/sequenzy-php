<?php

namespace Sequenzy\Types;

enum SendingStatusSelfResumeUnavailableReason: string
{
    case UnsupportedReason = "unsupported_reason";
    case WaitingForReview = "waiting_for_review";
    case BlockedByAi = "blocked_by_ai";
    case ReviewFailed = "review_failed";
    case BlockedByAdmin = "blocked_by_admin";
}
