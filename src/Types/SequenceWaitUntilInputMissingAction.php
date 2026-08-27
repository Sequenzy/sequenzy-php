<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilInputMissingAction: string
{
    case Continue_ = "continue";
    case Exit = "exit";
}
