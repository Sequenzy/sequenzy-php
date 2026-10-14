<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilWeekdayInputUntilTimezoneSource: string
{
    case Fixed = "fixed";
    case Subscriber = "subscriber";
}
