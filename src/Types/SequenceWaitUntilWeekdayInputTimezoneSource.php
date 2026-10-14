<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilWeekdayInputTimezoneSource: string
{
    case Fixed = "fixed";
    case Subscriber = "subscriber";
}
