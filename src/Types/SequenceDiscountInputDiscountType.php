<?php

namespace Sequenzy\Types;

enum SequenceDiscountInputDiscountType: string
{
    case Percent = "percent";
    case Amount = "amount";
}
