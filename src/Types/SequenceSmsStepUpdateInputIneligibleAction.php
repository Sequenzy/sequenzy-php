<?php

namespace Sequenzy\Types;

enum SequenceSmsStepUpdateInputIneligibleAction: string
{
    case Skip = "skip";
    case Exit = "exit";
}
