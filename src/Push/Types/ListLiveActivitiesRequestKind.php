<?php

namespace Sequenzy\Push\Types;

enum ListLiveActivitiesRequestKind: string
{
    case PushToStart = "push_to_start";
    case Update = "update";
}
