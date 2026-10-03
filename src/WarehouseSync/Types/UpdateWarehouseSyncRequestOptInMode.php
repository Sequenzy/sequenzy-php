<?php

namespace Sequenzy\WarehouseSync\Types;

enum UpdateWarehouseSyncRequestOptInMode: string
{
    case Confirmed = "confirmed";
    case DoubleOptIn = "double_opt_in";
}
