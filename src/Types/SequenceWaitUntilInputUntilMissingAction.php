<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilInputUntilMissingAction: string
{
    case Continue_ = "continue";
    case Exit = "exit";
}
