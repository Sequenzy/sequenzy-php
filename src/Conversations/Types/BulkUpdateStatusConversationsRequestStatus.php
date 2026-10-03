<?php

namespace Sequenzy\Conversations\Types;

enum BulkUpdateStatusConversationsRequestStatus: string
{
    case Open = "open";
    case Closed = "closed";
}
