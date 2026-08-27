<?php

namespace Sequenzy\Analytics\Types;

enum GetCampaignStatsLegacyRequestPeriod: string
{
    case OneH = "1h";
    case TwentyFourH = "24h";
    case SevenD = "7d";
    case ThirtyD = "30d";
    case NinetyD = "90d";
}
