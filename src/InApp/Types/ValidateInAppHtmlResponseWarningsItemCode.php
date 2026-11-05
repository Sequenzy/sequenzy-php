<?php

namespace Sequenzy\InApp\Types;

enum ValidateInAppHtmlResponseWarningsItemCode: string
{
    case NoClose = "no_close";
    case ExternalScripts = "external_scripts";
    case BrazeConverted = "braze_converted";
    case UnsupportedBridgeMethod = "unsupported_bridge_method";
}
