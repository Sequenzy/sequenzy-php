<?php

namespace Sequenzy\Types;

enum SequenceDelayInputUntilPastAction: string
{
    case Continue_ = "continue";
    case Skip = "skip";
    case Exit = "exit";
}
