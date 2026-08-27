<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilInputDirection: string
{
    case Before = "before";
    case After = "after";
}
