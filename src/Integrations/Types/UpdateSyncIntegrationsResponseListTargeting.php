<?php

namespace Sequenzy\Integrations\Types;

enum UpdateSyncIntegrationsResponseListTargeting: string
{
    case CompanyDefault = "company_default";
    case None = "none";
    case Specific = "specific";
}
