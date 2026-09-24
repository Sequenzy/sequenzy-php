<?php

namespace Sequenzy\Types;

enum AccountOrganizationIdJobSettingsSource: string
{
    case Event = "event";
    case Attribute = "attribute";
    case Domains = "domains";
}
