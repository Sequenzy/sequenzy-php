<?php

namespace Sequenzy\Subscribers\Types;

enum GetAccountInfoResponseAccountApiKeyType: string
{
    case Company = "company";
    case Personal = "personal";
}
