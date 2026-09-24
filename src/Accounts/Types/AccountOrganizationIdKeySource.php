<?php

namespace Sequenzy\Accounts\Types;

enum AccountOrganizationIdKeySource: string
{
    case Event = "event";
    case Attribute = "attribute";
}
