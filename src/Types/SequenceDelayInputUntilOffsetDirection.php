<?php

namespace Sequenzy\Types;

enum SequenceDelayInputUntilOffsetDirection: string
{
    case Before = "before";
    case After = "after";
}
