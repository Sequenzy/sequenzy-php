<?php

namespace Sequenzy\Transactional\Types;

enum ListTransactionalConditionalBlockSubscribersAliasRequestBranch: string
{
    case If_ = "if";
    case Else_ = "else";
    case Shown = "shown";
    case Hidden = "hidden";
    case Skipped = "skipped";
}
