<?php

namespace Sequenzy\Types;

enum SequencePathStepConfigTimeoutAction: string
{
    case Continue_ = "continue";
    case Exit = "exit";
}
