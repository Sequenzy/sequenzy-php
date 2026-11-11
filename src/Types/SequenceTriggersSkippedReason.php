<?php

namespace Sequenzy\Types;

enum SequenceTriggersSkippedReason: string
{
    case MissingScope = "missing_scope";
    case NotRequested = "not_requested";
    case Historical = "historical";
}
