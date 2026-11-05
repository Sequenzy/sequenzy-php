<?php

namespace Sequenzy\Types;

enum SequenceTemplateSummaryRequiresIntegrationType: string
{
    case Stripe = "stripe";
    case AppSubscriptions = "app_subscriptions";
    case MobileSdk = "mobile_sdk";
}
