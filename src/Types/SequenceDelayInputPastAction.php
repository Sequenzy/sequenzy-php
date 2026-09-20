<?php

namespace Sequenzy\Types;

enum SequenceDelayInputPastAction: string
{
    case Continue_ = "continue";
    case Skip = "skip";
    case Exit = "exit";
}
