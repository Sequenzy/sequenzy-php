<?php

namespace Sequenzy\Suppressions\Types;

enum ListSuppressionsRequestSort: string
{
    case SuppressedAt = "suppressedAt";
    case Email = "email";
    case Status = "status";
}
