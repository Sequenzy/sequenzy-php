<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilKeyDateInputMissingAction: string
{
    case Continue_ = "continue";
    case Exit = "exit";
}
