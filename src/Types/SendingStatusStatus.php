<?php

namespace Sequenzy\Types;

enum SendingStatusStatus: string
{
    case Active = "active";
    case Paused = "paused";
    case Suspended = "suspended";
}
