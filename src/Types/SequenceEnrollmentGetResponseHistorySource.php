<?php

namespace Sequenzy\Types;

enum SequenceEnrollmentGetResponseHistorySource: string
{
    case NodeEvents = "node_events";
    case TokenContext = "token_context";
    case Both = "both";
    case None = "none";
}
