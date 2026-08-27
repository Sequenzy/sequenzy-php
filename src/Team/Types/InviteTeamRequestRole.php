<?php

namespace Sequenzy\Team\Types;

enum InviteTeamRequestRole: string
{
    case Admin = "admin";
    case Viewer = "viewer";
    case Restricted = "restricted";
}
