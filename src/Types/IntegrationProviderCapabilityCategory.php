<?php

namespace Sequenzy\Types;

enum IntegrationProviderCapabilityCategory: string
{
    case Payments = "payments";
    case Ecommerce = "ecommerce";
    case Auth = "auth";
    case Analytics = "analytics";
    case Ads = "ads";
    case Affiliate = "affiliate";
    case Cms = "cms";
    case Crm = "crm";
    case Developer = "developer";
}
