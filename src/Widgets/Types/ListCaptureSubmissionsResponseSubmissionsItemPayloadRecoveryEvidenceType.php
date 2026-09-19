<?php

namespace Sequenzy\Widgets\Types;

enum ListCaptureSubmissionsResponseSubmissionsItemPayloadRecoveryEvidenceType: string
{
    case ContactAdded = "contact.added";
    case SubscriberUpdated = "subscriber.updated";
}
