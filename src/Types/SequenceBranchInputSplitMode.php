<?php

namespace Sequenzy\Types;

enum SequenceBranchInputSplitMode: string
{
    case Condition = "condition";
    case Random = "random";
}
