<?php

namespace Sequenzy\Types;

enum SequenceStepInputDiscountType: string
{
    case Percent = "percent";
    case Amount = "amount";
}
