<?php

namespace Sequenzy\Types;

enum WarehouseSyncOptInMode: string
{
    case Confirmed = "confirmed";
    case DoubleOptIn = "double_opt_in";
}
