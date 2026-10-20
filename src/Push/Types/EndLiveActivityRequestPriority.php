<?php

namespace Sequenzy\Push\Types;

enum EndLiveActivityRequestPriority: string
{
    case High = "high";
    case Low = "low";
}
