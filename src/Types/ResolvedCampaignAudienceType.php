<?php

namespace Sequenzy\Types;

enum ResolvedCampaignAudienceType: string
{
    case Unset = "unset";
    case All = "all";
    case Lists = "lists";
    case Segment = "segment";
    case Filtered = "filtered";
    case Rules = "rules";
}
