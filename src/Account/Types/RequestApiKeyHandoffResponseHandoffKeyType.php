<?php

namespace Sequenzy\Account\Types;

enum RequestApiKeyHandoffResponseHandoffKeyType: string
{
    case Company = "company";
    case Personal = "personal";
}
