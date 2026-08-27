<?php

namespace Sequenzy\Types;

enum SequenceGoalAttributeCondition: string
{
    case Changed = "changed";
    case ChangedTo = "changed_to";
    case ChangedFromTo = "changed_from_to";
}
