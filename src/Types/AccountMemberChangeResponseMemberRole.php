<?php

namespace Sequenzy\Types;

enum AccountMemberChangeResponseMemberRole: string
{
    case Owner = "owner";
    case Admin = "admin";
    case Member = "member";
}
