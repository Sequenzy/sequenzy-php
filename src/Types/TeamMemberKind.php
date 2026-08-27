<?php

namespace Sequenzy\Types;

enum TeamMemberKind: string
{
    case Owner = "owner";
    case Member = "member";
    case Invitation = "invitation";
}
