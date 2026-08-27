<?php

namespace Sequenzy\Types;

enum SegmentFilterJoinOperator: string
{
    case And_ = "and";
    case Or_ = "or";
}
