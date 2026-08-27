<?php

namespace Sequenzy\Types;

enum SequenceBranchPathStepInputNodeType: string
{
    case LogicDelay = "logic_delay";
    case ActionEmail = "action_email";
    case ActionSms = "action_sms";
    case ActionCreateDiscount = "action_create_discount";
    case ActionAddTag = "action_add_tag";
    case ActionRemoveTag = "action_remove_tag";
    case ActionAddToList = "action_add_to_list";
    case ActionRemoveFromList = "action_remove_from_list";
    case ActionUpdateAttributes = "action_update_attributes";
    case LogicWaitForEvent = "logic_wait_for_event";
    case LogicCondition = "logic_condition";
    case ActionWebhook = "action_webhook";
    case ActionAi = "action_ai";
}
