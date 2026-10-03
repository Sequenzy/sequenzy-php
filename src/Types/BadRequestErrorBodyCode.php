<?php

namespace Sequenzy\Types;

enum BadRequestErrorBodyCode: string
{
    case SegmentReferenceDepthExceeded = "SEGMENT_REFERENCE_DEPTH_EXCEEDED";
    case SegmentReferenceCountExceeded = "SEGMENT_REFERENCE_COUNT_EXCEEDED";
}
