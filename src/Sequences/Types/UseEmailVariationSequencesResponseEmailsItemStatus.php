<?php

namespace Sequenzy\Sequences\Types;

enum UseEmailVariationSequencesResponseEmailsItemStatus: string
{
    case Changed = "changed";
    case Unchanged = "unchanged";
    case Failed = "failed";
}
