<?php

namespace Sequenzy\Types;

enum SequenceDelayInputMissingAction: string
{
    case Continue_ = "continue";
    case Exit = "exit";
}
