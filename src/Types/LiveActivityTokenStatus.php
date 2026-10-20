<?php

namespace Sequenzy\Types;

enum LiveActivityTokenStatus: string
{
    case Active = "active";
    case Ended = "ended";
    case Invalid = "invalid";
}
