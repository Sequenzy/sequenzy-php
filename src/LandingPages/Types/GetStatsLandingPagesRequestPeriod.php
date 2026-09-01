<?php

namespace Sequenzy\LandingPages\Types;

enum GetStatsLandingPagesRequestPeriod: string
{
    case SevenD = "7d";
    case ThirtyD = "30d";
    case NinetyD = "90d";
    case All = "all";
}
