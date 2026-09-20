<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilKeyDateInputUntilMissingAction: string
{
    case Continue_ = "continue";
    case Exit = "exit";
}
