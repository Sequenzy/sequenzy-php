<?php

namespace Sequenzy\Types;

enum ResolvedAudienceRuleType: string
{
    case All = "all";
    case Lists = "lists";
    case Segments = "segments";
    case Filtered = "filtered";
}
