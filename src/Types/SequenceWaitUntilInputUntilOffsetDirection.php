<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilInputUntilOffsetDirection: string
{
    case Before = "before";
    case After = "after";
}
