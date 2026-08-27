<?php

namespace Sequenzy\Types;

enum SequenceTriggerType: string
{
    case ContactAdded = "contact_added";
    case TagAdded = "tag_added";
    case SegmentEntered = "segment_entered";
    case EventReceived = "event_received";
    case InboundWebhook = "inbound_webhook";
    case Inactivity = "inactivity";
    case Frequency = "frequency";
}
