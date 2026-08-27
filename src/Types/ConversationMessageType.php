<?php

namespace Sequenzy\Types;

enum ConversationMessageType: string
{
    case Inbound = "inbound";
    case Outbound = "outbound";
    case Note = "note";
}
