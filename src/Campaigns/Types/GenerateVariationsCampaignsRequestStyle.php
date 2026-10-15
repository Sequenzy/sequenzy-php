<?php

namespace Sequenzy\Campaigns\Types;

enum GenerateVariationsCampaignsRequestStyle: string
{
    case Close = "close";
    case Fresh = "fresh";
    case Bold = "bold";
}
