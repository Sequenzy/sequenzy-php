<?php

namespace Sequenzy\Conversations\Types;

enum SendMessageConversationsRequestType: string
{
    case Outbound = "outbound";
    case Note = "note";
}
