<?php

namespace Sequenzy\Conversations\Types;

enum UpdateStatusConversationsRequestStatus: string
{
    case Open = "open";
    case Closed = "closed";
}
