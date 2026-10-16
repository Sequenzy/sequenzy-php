<?php

namespace Sequenzy\Types;

enum AccountHealthActionKind: string
{
    case CreateSequence = "create_sequence";
    case OpenSequence = "open_sequence";
    case ActivateSequence = "activate_sequence";
    case PauseSequence = "pause_sequence";
    case CreateCampaign = "create_campaign";
    case ReviewCampaignDrafts = "review_campaign_drafts";
    case OpenCampaign = "open_campaign";
    case VerifySendingDomain = "verify_sending_domain";
    case OpenDomainSettings = "open_domain_settings";
    case ReviewDeliverability = "review_deliverability";
    case OpenFrequencyCapSettings = "open_frequency_cap_settings";
    case ApplyFrequencyCap = "apply_frequency_cap";
}
