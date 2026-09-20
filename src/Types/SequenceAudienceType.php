<?php

namespace Sequenzy\Types;

enum SequenceAudienceType: string
{
    case All = "all";
    case Lists = "lists";
    case Segment = "segment";
    case Filtered = "filtered";
    case Rules = "rules";
}
