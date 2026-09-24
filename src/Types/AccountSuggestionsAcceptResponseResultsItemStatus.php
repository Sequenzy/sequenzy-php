<?php

namespace Sequenzy\Types;

enum AccountSuggestionsAcceptResponseResultsItemStatus: string
{
    case Created = "created";
    case Updated = "updated";
    case Skipped = "skipped";
}
