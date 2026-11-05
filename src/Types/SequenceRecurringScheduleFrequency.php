<?php

namespace Sequenzy\Types;

enum SequenceRecurringScheduleFrequency: string
{
    case Daily = "daily";
    case Weekly = "weekly";
    case Monthly = "monthly";
}
