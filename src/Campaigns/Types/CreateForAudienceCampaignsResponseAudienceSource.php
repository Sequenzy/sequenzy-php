<?php

namespace Sequenzy\Campaigns\Types;

enum CreateForAudienceCampaignsResponseAudienceSource: string
{
    case Contacts = "contacts";
    case EmailActivity = "email_activity";
}
