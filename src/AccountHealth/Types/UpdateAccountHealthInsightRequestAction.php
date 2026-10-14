<?php

namespace Sequenzy\AccountHealth\Types;

enum UpdateAccountHealthInsightRequestAction: string
{
    case Dismiss = "dismiss";
    case Snooze = "snooze";
    case Resolve = "resolve";
    case Reopen = "reopen";
}
