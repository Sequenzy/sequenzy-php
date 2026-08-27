<?php

namespace Sequenzy\Conversations\Types;

enum ListConversationsRequestStatus: string
{
    case All = "all";
    case Open = "open";
    case Closed = "closed";
}
