<?php

namespace Sequenzy\Types;

enum AccountHealthInsightSeverity: string
{
    case High = "high";
    case Medium = "medium";
    case Low = "low";
}
