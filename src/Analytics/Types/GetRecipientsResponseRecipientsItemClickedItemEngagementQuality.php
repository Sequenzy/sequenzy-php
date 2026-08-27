<?php

namespace Sequenzy\Analytics\Types;

enum GetRecipientsResponseRecipientsItemClickedItemEngagementQuality: string
{
    case Human = "human";
    case Machine = "machine";
    case Asset = "asset";
}
