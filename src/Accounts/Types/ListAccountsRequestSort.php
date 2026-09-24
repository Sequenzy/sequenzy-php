<?php

namespace Sequenzy\Accounts\Types;

enum ListAccountsRequestSort: string
{
    case UpdatedAt = "updatedAt";
    case CreatedAt = "createdAt";
    case Name = "name";
    case MemberCount = "memberCount";
    case LastEventAt = "lastEventAt";
}
