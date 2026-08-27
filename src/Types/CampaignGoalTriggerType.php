<?php

namespace Sequenzy\Types;

enum CampaignGoalTriggerType: string
{
    case Event = "event";
    case AttributeChange = "attribute_change";
    case TagAdded = "tag_added";
}
