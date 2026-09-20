<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilKeyDateInputPastAction: string
{
    case Continue_ = "continue";
    case Skip = "skip";
    case Exit = "exit";
}
