<?php

namespace Sequenzy\Types;

enum WebsiteTrackingPolicy: string
{
    case Required = "required";
    case Legacy = "legacy";
}
