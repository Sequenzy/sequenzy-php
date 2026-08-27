<?php

namespace Sequenzy\Products\Types;

enum AttachDeliveryProductsRequestSource: string
{
    case Upload = "upload";
    case Url = "url";
}
