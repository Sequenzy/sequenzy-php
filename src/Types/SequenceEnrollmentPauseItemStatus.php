<?php

namespace Sequenzy\Types;

enum SequenceEnrollmentPauseItemStatus: string
{
    case Active = "active";
    case Waiting = "waiting";
    case Paused = "paused";
}
