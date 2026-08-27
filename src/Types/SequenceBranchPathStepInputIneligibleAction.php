<?php

namespace Sequenzy\Types;

enum SequenceBranchPathStepInputIneligibleAction: string
{
    case Skip = "skip";
    case Exit = "exit";
}
