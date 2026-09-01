<?php

namespace Sequenzy\Types;

enum CompanyEmailBrandingSubscriptionStatus: string
{
    case Active = "active";
    case PastDue = "past_due";
    case Canceled = "canceled";
    case Trialing = "trialing";
    case Incomplete = "incomplete";
}
