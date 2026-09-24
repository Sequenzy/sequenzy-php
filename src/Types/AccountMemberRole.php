<?php

namespace Sequenzy\Types;

enum AccountMemberRole: string
{
    case Owner = "owner";
    case Admin = "admin";
    case Member = "member";
}
