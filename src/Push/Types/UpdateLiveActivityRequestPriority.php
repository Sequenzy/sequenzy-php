<?php

namespace Sequenzy\Push\Types;

enum UpdateLiveActivityRequestPriority: string
{
    case High = "high";
    case Low = "low";
}
