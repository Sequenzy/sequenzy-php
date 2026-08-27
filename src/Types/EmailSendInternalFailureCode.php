<?php

namespace Sequenzy\Types;

enum EmailSendInternalFailureCode: string
{
    case TransportExhausted = "transport_exhausted";
    case AdminBounce = "admin_bounce";
    case CrashOrphanedClaim = "crash_orphaned_claim";
}
