<?php

namespace Sequenzy\Conversations\Types;

enum UpdateStatusConversationsResponseConversationStatus: string
{
    case Open = "open";
    case Closed = "closed";
}
