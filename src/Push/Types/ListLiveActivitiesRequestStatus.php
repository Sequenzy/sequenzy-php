<?php

namespace Sequenzy\Push\Types;

enum ListLiveActivitiesRequestStatus: string
{
    case Active = "active";
    case Ended = "ended";
    case Invalid = "invalid";
}
