<?php

namespace Sequenzy\Types;

enum CompanyEmailBrandingReason: string
{
    case FreePlan = "free_plan";
    case PaidPlan = "paid_plan";
    case EmailPartner = "email_partner";
    case InactiveSubscription = "inactive_subscription";
    case CompanyNotFound = "company_not_found";
}
