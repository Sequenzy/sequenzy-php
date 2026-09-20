<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilKeyDateInputDirection: string
{
    case Before = "before";
    case After = "after";
}
