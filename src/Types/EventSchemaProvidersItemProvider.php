<?php

namespace Sequenzy\Types;

enum EventSchemaProvidersItemProvider: string
{
    case Shopify = "shopify";
    case Woocommerce = "woocommerce";
    case Manual = "manual";
    case Api = "api";
    case Stripe = "stripe";
}
