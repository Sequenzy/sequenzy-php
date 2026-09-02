<?php

namespace Sequenzy\Types;

enum NotificationPreferenceEvent: string
{
    case NewSubscriber = "new_subscriber";
    case FormSubmitted = "form_submitted";
    case CampaignCompleted = "campaign_completed";
    case WeeklyReport = "weekly_report";
}
