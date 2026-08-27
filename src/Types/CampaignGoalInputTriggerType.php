<?php

namespace Sequenzy\Types;

enum CampaignGoalInputTriggerType: string
{
    case Event = "event";
    case AttributeChange = "attribute_change";
    case TagAdded = "tag_added";
}
