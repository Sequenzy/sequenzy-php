<?php

namespace Sequenzy\Types;

enum IntegrationDetailIngestionListTargeting: string
{
    case CompanyDefault = "company_default";
    case None = "none";
    case Specific = "specific";
}
