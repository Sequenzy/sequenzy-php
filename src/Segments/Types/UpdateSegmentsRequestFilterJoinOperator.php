<?php

namespace Sequenzy\Segments\Types;

enum UpdateSegmentsRequestFilterJoinOperator: string
{
    case And_ = "and";
    case Or_ = "or";
}
