<?php

namespace Sequenzy\Types;

enum SequenceStepInputIneligibleAction: string
{
    case Skip = "skip";
    case Exit = "exit";
}
