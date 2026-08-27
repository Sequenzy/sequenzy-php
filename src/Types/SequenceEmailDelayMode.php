<?php

namespace Sequenzy\Types;

enum SequenceEmailDelayMode: string
{
    case Duration = "duration";
    case UntilDate = "until_date";
    case UntilWeekday = "until_weekday";
}
