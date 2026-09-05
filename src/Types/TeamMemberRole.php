<?php

namespace Sequenzy\Types;

enum TeamMemberRole: string
{
    case Owner = "owner";
    case Admin = "admin";
    case Marketer = "marketer";
    case Viewer = "viewer";
    case Restricted = "restricted";
}
