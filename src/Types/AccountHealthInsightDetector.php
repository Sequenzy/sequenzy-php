<?php

namespace Sequenzy\Types;

enum AccountHealthInsightDetector: string
{
    case UnhandledEvent = "unhandled_event";
    case StalledSequence = "stalled_sequence";
    case CampaignGap = "campaign_gap";
    case StaleCampaignDrafts = "stale_campaign_drafts";
    case UnderperformingSequenceEmail = "underperforming_sequence_email";
    case DeliverabilitySpike = "deliverability_spike";
    case SendingDomainFailing = "sending_domain_failing";
}
