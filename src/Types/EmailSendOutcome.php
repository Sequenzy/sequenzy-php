<?php

namespace Sequenzy\Types;

enum EmailSendOutcome: string
{
    case Bounced = "bounced";
    case Blocked = "blocked";
    case Delayed = "delayed";
    case Failed = "failed";
}
