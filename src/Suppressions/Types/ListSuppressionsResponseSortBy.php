<?php

namespace Sequenzy\Suppressions\Types;

enum ListSuppressionsResponseSortBy: string
{
    case SuppressedAt = "suppressedAt";
    case Email = "email";
    case Status = "status";
}
