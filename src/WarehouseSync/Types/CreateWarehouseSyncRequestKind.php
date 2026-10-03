<?php

namespace Sequenzy\WarehouseSync\Types;

enum CreateWarehouseSyncRequestKind: string
{
    case Subscribers = "subscribers";
    case Events = "events";
}
