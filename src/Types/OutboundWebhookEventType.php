<?php

namespace Sequenzy\Types;

enum OutboundWebhookEventType: string
{
    case EmailSent = "email.sent";
    case EmailDelivered = "email.delivered";
    case EmailDeliveryDelayed = "email.delivery_delayed";
    case EmailBounced = "email.bounced";
    case EmailFailed = "email.failed";
    case EmailComplained = "email.complained";
    case EmailOpened = "email.opened";
    case EmailClicked = "email.clicked";
    case EmailReplied = "email.replied";
    case EmailUnsubscribed = "email.unsubscribed";
    case CampaignSent = "campaign.sent";
    case SmsSent = "sms.sent";
    case SmsDelivered = "sms.delivered";
    case SmsFailed = "sms.failed";
    case SmsOptedOut = "sms.opted_out";
    case SubscriberInvalid = "subscriber.invalid";
    case SubscriberCreated = "subscriber.created";
    case SubscriberUpdated = "subscriber.updated";
    case SubscriberUnsubscribed = "subscriber.unsubscribed";
    case SubscriberListSubscribed = "subscriber.list_subscribed";
    case SubscriberListUnsubscribed = "subscriber.list_unsubscribed";
    case SubscriberImportCompleted = "subscriber_import.completed";
    case SequenceFinished = "sequence.finished";
    case SequenceFailed = "sequence.failed";
    case PollAnswered = "poll.answered";
}
