<?php

namespace Sequenzy\Accounts\Types;

enum ListAccountsRequestWithoutEventRecipients: string
{
    case True = "true";
    case False = "false";
}
