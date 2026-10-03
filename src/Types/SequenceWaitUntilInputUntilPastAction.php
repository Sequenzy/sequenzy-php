<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilInputUntilPastAction: string
{
    case Continue_ = "continue";
    case Skip = "skip";
    case Exit = "exit";
}
