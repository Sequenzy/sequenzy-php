<?php

namespace Sequenzy\AbTests\Types;

enum UpdateAbTestsRequestWinnerCriteria: string
{
    case OpenRate = "open_rate";
    case ClickRate = "click_rate";
}
