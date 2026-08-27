<?php

namespace Sequenzy\AbTests\Types;

enum CreateAbTestsRequestWinnerCriteria: string
{
    case OpenRate = "open_rate";
    case ClickRate = "click_rate";
}
