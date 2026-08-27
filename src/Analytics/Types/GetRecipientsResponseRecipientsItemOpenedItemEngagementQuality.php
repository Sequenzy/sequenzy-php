<?php

namespace Sequenzy\Analytics\Types;

enum GetRecipientsResponseRecipientsItemOpenedItemEngagementQuality: string
{
    case Human = "human";
    case Machine = "machine";
    case Asset = "asset";
}
