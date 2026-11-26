<?php

namespace Sequenzy\Types;

enum SequencePathStepConfigConditionLogic: string
{
    case All = "all";
    case Any = "any";
}
