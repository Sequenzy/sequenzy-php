<?php

namespace Sequenzy\Subscribers\Types;

enum UpdateSubscribersRequestCustomAttributesStrategy: string
{
    case Replace = "replace";
    case Merge = "merge";
}
