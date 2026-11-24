<?php

namespace Sequenzy\Campaigns\Types;

enum ListConditionalBlockSubscribersAliasCampaignsRequestBranch: string
{
    case If_ = "if";
    case Else_ = "else";
    case Shown = "shown";
    case Hidden = "hidden";
    case Skipped = "skipped";
}
