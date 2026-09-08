<?php

namespace Sequenzy\Subscribers\Types;

enum SubscriberOperationStartAudienceFilterJoinOperator: string
{
    case And_ = "and";
    case Or_ = "or";
}
