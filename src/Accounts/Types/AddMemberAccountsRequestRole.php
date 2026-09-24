<?php

namespace Sequenzy\Accounts\Types;

enum AddMemberAccountsRequestRole: string
{
    case Owner = "owner";
    case Admin = "admin";
    case Member = "member";
}
