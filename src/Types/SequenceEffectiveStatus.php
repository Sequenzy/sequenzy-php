<?php

namespace Sequenzy\Types;

enum SequenceEffectiveStatus: string
{
    case Draft = "draft";
    case Live = "live";
    case EnrollmentPaused = "enrollment_paused";
    case Paused = "paused";
    case Archived = "archived";
}
