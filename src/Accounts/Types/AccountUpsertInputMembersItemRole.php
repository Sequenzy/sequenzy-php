<?php

namespace Sequenzy\Accounts\Types;

enum AccountUpsertInputMembersItemRole: string
{
    case Owner = "owner";
    case Admin = "admin";
    case Member = "member";
}
