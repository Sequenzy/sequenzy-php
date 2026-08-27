<?php

namespace Sequenzy\Suppressions\Types;

enum ListSuppressionsResponseSuppressionsItemScope: string
{
    case Global_ = "global";
    case Company = "company";
}
