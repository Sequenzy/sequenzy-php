<?php

namespace Sequenzy\Types;

enum AbTestSignificanceStatus: string
{
    case InsufficientData = "insufficient_data";
    case NotSignificant = "not_significant";
    case Significant = "significant";
}
