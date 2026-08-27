<?php

namespace Sequenzy\Team\Types;

enum InviteTeamResponseInvitationRole: string
{
    case Admin = "admin";
    case Viewer = "viewer";
    case Restricted = "restricted";
}
