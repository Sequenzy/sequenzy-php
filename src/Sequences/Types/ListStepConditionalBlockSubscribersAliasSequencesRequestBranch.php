<?php

namespace Sequenzy\Sequences\Types;

enum ListStepConditionalBlockSubscribersAliasSequencesRequestBranch: string
{
    case If_ = "if";
    case Else_ = "else";
    case Shown = "shown";
    case Hidden = "hidden";
    case Skipped = "skipped";
}
