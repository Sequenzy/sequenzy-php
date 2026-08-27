<?php

namespace Sequenzy\Types;

enum CommerceValueForecastStatus: string
{
    case Ready = "ready";
    case InsufficientData = "insufficient_data";
}
