<?php

namespace Sequenzy\Types;

enum SequenceDelayInputUntilTimezoneSource: string
{
    case Fixed = "fixed";
    case Subscriber = "subscriber";
}
