<?php

namespace Sequenzy\Types;

enum WarehouseConnectionStatus: string
{
    case Connected = "connected";
    case Error = "error";
}
