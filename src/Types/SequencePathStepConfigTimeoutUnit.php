<?php

namespace Sequenzy\Types;

enum SequencePathStepConfigTimeoutUnit: string
{
    case Minutes = "minutes";
    case Hours = "hours";
    case Days = "days";
    case Weeks = "weeks";
}
