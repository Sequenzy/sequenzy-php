<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilKeyDateInputUntilPastAction: string
{
    case Continue_ = "continue";
    case Skip = "skip";
    case Exit = "exit";
}
