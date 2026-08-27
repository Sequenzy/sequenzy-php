<?php

namespace Sequenzy\Types;

enum SequenceBranchPathStepInputType: string
{
    case Email = "email";
    case Sms = "sms";
    case Delay = "delay";
    case CreateDiscount = "create_discount";
    case Discount = "discount";
    case UpdateSubscriber = "update_subscriber";
    case Condition = "condition";
    case Webhook = "webhook";
    case Ai = "ai";
}
