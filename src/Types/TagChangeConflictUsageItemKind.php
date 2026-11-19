<?php

namespace Sequenzy\Types;

enum TagChangeConflictUsageItemKind: string
{
    case Sequence = "sequence";
    case Segment = "segment";
    case Campaign = "campaign";
    case Email = "email";
    case EmailComponent = "email_component";
    case SyncRule = "sync_rule";
    case Goal = "goal";
    case Integration = "integration";
    case Form = "form";
    case Popup = "popup";
    case LandingPage = "landing_page";
}
