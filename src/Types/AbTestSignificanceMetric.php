<?php

namespace Sequenzy\Types;

enum AbTestSignificanceMetric: string
{
    case OpenRate = "open_rate";
    case ClickRate = "click_rate";
}
