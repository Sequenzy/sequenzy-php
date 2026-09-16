<?php

namespace Sequenzy\Types;

enum CompanyGoalAttributeCondition: string
{
    case Changed = "changed";
    case ChangedTo = "changed_to";
    case ChangedFromTo = "changed_from_to";
}
