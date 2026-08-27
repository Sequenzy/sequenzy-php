<?php

namespace Sequenzy\Account\Types;

enum GetAccountResponseApiKeyPermissionsActiveKeyType: string
{
    case Company = "company";
    case Personal = "personal";
}
