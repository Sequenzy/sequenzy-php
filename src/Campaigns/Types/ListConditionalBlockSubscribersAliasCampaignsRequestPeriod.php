<?php

namespace Sequenzy\Campaigns\Types;

enum ListConditionalBlockSubscribersAliasCampaignsRequestPeriod: string
{
    case OneH = "1h";
    case TwentyFourH = "24h";
    case SevenD = "7d";
    case ThirtyD = "30d";
    case NinetyD = "90d";
    case All = "all";
}
