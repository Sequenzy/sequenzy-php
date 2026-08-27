<?php

namespace Sequenzy\Types;

enum SequenceDiscountInputDuration: string
{
    case Once = "once";
    case Forever = "forever";
    case Repeating = "repeating";
}
