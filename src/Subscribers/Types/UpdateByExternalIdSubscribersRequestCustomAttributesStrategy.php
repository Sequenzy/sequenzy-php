<?php

namespace Sequenzy\Subscribers\Types;

enum UpdateByExternalIdSubscribersRequestCustomAttributesStrategy: string
{
    case Replace = "replace";
    case Merge = "merge";
}
