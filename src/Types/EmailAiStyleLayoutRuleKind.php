<?php

namespace Sequenzy\Types;

enum EmailAiStyleLayoutRuleKind: string
{
    case Opener = "opener";
    case Around = "around";
    case Before = "before";
    case After = "after";
}
