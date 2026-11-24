<?php

namespace Sequenzy\Sequences\Types;

enum GetOutcomesAliasSequencesRequestPeriod: string
{
    case OneH = "1h";
    case TwentyFourH = "24h";
    case SevenD = "7d";
    case ThirtyD = "30d";
    case NinetyD = "90d";
}
