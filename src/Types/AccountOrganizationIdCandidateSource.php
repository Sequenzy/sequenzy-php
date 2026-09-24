<?php

namespace Sequenzy\Types;

enum AccountOrganizationIdCandidateSource: string
{
    case Event = "event";
    case Attribute = "attribute";
}
