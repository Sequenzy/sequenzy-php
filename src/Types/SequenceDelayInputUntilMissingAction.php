<?php

namespace Sequenzy\Types;

enum SequenceDelayInputUntilMissingAction: string
{
    case Continue_ = "continue";
    case Exit = "exit";
}
