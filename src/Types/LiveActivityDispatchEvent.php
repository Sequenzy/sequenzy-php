<?php

namespace Sequenzy\Types;

enum LiveActivityDispatchEvent: string
{
    case Start = "start";
    case Update = "update";
    case End = "end";
}
