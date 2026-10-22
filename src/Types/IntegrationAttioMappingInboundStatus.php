<?php

namespace Sequenzy\Types;

enum IntegrationAttioMappingInboundStatus: string
{
    case Off = "off";
    case Active = "active";
    case Error = "error";
}
