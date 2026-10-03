<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilInputPastAction: string
{
    case Continue_ = "continue";
    case Skip = "skip";
    case Exit = "exit";
}
