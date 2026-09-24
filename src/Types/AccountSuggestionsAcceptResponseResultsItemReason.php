<?php

namespace Sequenzy\Types;

enum AccountSuggestionsAcceptResponseResultsItemReason: string
{
    case NoContacts = "no_contacts";
    case MultipleAccounts = "multiple_accounts";
    case AlreadyInAccount = "already_in_account";
}
