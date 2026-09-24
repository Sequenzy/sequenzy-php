<?php

namespace Sequenzy\Accounts\Types;

enum ListAccountsRequestOrder: string
{
    case Asc = "asc";
    case Desc = "desc";
}
