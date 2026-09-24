<?php

namespace Sequenzy\Accounts\Types;

enum PreviewFromOrganizationIdAccountsRequestSource: string
{
    case Event = "event";
    case Attribute = "attribute";
}
