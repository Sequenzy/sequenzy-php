<?php

namespace Sequenzy\Types;

enum SequenceDelayInputDirection: string
{
    case Before = "before";
    case After = "after";
}
