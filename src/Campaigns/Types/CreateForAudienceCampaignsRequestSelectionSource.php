<?php

namespace Sequenzy\Campaigns\Types;

enum CreateForAudienceCampaignsRequestSelectionSource: string
{
    case Contacts = "contacts";
    case EmailActivity = "email_activity";
}
