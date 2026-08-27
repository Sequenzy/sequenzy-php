<?php

namespace Sequenzy\Sequences\Types;

enum SequenceCreateRequestInactivityBaseline: string
{
    case SequenceCreatedAt = "sequence_created_at";
    case SubscriberCreatedAt = "subscriber_created_at";
}
