<?php

namespace Sequenzy\Sequences\Types;

enum EditEmailsSequencesResponseEmailsItemStatus: string
{
    case Changed = "changed";
    case Unchanged = "unchanged";
    case Failed = "failed";
}
