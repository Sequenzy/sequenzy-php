<?php

namespace Sequenzy\Types;

enum SequenceBranchConditionInputConditionType: string
{
    case HasTag = "has_tag";
    case DoesNotHaveTag = "does_not_have_tag";
    case InList = "in_list";
    case InSegment = "in_segment";
    case InSequence = "in_sequence";
    case NotInSequence = "not_in_sequence";
    case CompletedSequence = "completed_sequence";
    case NotCompletedSequence = "not_completed_sequence";
    case EventReceived = "event_received";
    case LinkClicked = "link_clicked";
    case FieldEquals = "field_equals";
    case FieldContains = "field_contains";
    case FieldGreaterThan = "field_greater_than";
    case FieldLessThan = "field_less_than";
    case HasPhone = "has_phone";
    case SmsSubscribed = "sms_subscribed";
    case HasPushDevice = "has_push_device";
}
