<?php

namespace Sequenzy\Types;

enum SequencePathStepConfigOnError: string
{
    case Continue_ = "continue";
    case Exit = "exit";
    case Fail = "fail";
}
