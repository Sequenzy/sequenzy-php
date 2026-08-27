<?php

namespace Sequenzy\Segments\Types;

enum CreateSegmentsRequestFilterJoinOperator: string
{
    case And_ = "and";
    case Or_ = "or";
}
