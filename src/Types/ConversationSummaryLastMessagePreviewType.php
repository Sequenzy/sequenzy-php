<?php

namespace Sequenzy\Types;

enum ConversationSummaryLastMessagePreviewType: string
{
    case Inbound = "inbound";
    case Outbound = "outbound";
}
