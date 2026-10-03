<?php

namespace Sequenzy\Types;

enum WarehouseSyncKind: string
{
    case Subscribers = "subscribers";
    case Events = "events";
}
