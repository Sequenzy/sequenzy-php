<?php

namespace Sequenzy\AbTests\Types;

enum CreateAbTestsRequestWinnerCriteria: string
{
    case OpenRate = "open_rate";
    case ClickRate = "click_rate";
    case GoalConversionRate = "goal_conversion_rate";
    case GoalValue = "goal_value";
    case EventRate = "event_rate";
}
