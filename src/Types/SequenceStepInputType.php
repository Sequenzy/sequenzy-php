<?php

namespace Sequenzy\Types;

enum SequenceStepInputType: string
{
    case Email = "email";
    case Sms = "sms";
    case CreateDiscount = "create_discount";
    case Discount = "discount";
    case UpdateSubscriber = "update_subscriber";
}
