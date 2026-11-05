<?php

namespace Sequenzy\Types;

enum SequenceTemplateSummaryTriggerType: string
{
    case ContactAdded = "contact_added";
    case TagAdded = "tag_added";
    case EventReceived = "event_received";
    case Inactivity = "inactivity";
    case Manual = "manual";
}
