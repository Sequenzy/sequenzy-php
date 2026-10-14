<?php

namespace Sequenzy\Types;

enum AccountHealthInsightStatus: string
{
    case Open = "open";
    case Snoozed = "snoozed";
    case Dismissed = "dismissed";
    case Resolved = "resolved";
}
