<?php

namespace Sequenzy\Types;

enum SequenceStepInputNodeType: string
{
    case ActionEmail = "action_email";
    case ActionSms = "action_sms";
    case ActionPush = "action_push";
    case ActionCreateDiscount = "action_create_discount";
    case ActionUpdateAttributes = "action_update_attributes";
}
