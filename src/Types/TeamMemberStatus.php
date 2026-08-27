<?php

namespace Sequenzy\Types;

enum TeamMemberStatus: string
{
    case Joined = "joined";
    case Pending = "pending";
    case Expired = "expired";
}
