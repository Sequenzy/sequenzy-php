<?php

namespace Sequenzy\Types;

enum SequenceAudienceFilterJoinOperator: string
{
    case And_ = "and";
    case Or_ = "or";
}
