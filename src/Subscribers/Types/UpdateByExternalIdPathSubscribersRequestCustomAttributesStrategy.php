<?php

namespace Sequenzy\Subscribers\Types;

enum UpdateByExternalIdPathSubscribersRequestCustomAttributesStrategy: string
{
    case Replace = "replace";
    case Merge = "merge";
}
