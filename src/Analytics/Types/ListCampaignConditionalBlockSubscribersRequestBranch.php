<?php

namespace Sequenzy\Analytics\Types;

enum ListCampaignConditionalBlockSubscribersRequestBranch: string
{
    case If_ = "if";
    case Else_ = "else";
    case Shown = "shown";
    case Hidden = "hidden";
    case Skipped = "skipped";
}
