<?php

namespace Sequenzy\Types;

enum SequenceBranchConditionInputActivityScope: string
{
    case Ever = "ever";
    case ThisSequence = "this_sequence";
    case PreviousEmail = "previous_email";
}
