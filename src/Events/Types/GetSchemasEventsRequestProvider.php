<?php

namespace Sequenzy\Events\Types;

enum GetSchemasEventsRequestProvider: string
{
    case Shopify = "shopify";
    case Woocommerce = "woocommerce";
    case Manual = "manual";
    case Api = "api";
    case Stripe = "stripe";
}
