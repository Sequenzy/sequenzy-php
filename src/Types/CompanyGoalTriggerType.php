<?php

namespace Sequenzy\Types;

enum CompanyGoalTriggerType: string
{
    case Event = "event";
    case AttributeChange = "attribute_change";
    case TagAdded = "tag_added";
}
