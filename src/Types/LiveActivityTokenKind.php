<?php

namespace Sequenzy\Types;

enum LiveActivityTokenKind: string
{
    case PushToStart = "push_to_start";
    case Update = "update";
}
