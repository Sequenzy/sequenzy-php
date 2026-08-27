<?php

namespace Sequenzy\Campaigns\Types;

enum DuplicateCampaignsRequestMode: string
{
    case Campaign = "campaign";
    case AbTest = "ab_test";
    case Variant = "variant";
}
