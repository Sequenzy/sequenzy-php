<?php

namespace Sequenzy\Conversations\Types;

enum BulkUpdateStatusConversationsResponseStatus: string
{
    case Open = "open";
    case Closed = "closed";
}
