<?php

namespace Sequenzy\Types;

enum SequenceEnrollmentPauseItemOutcome: string
{
    case Paused = "paused";
    case AlreadyPaused = "already_paused";
    case InProgress = "in_progress";
    case Resumed = "resumed";
    case NotPaused = "not_paused";
}
