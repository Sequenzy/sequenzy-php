<?php

namespace Sequenzy\Types;

enum SequenceDefinitionManagedBy: string
{
    case Code = "code";
    case Dashboard = "dashboard";
}
