<?php

namespace Sequenzy\Types;

enum CompanyEmailBrandingRemovalAction: string
{
    case None = "none";
    case Upgrade = "upgrade";
    case RenewSubscription = "renew_subscription";
}
