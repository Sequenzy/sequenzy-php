<?php

namespace Sequenzy\WarehouseSync\Types;

enum CreateWarehouseSyncRequestOptInMode: string
{
    case Confirmed = "confirmed";
    case DoubleOptIn = "double_opt_in";
}
