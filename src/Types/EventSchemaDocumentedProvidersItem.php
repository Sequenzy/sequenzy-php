<?php

namespace Sequenzy\Types;

enum EventSchemaDocumentedProvidersItem: string
{
    case Shopify = "shopify";
    case Woocommerce = "woocommerce";
    case Manual = "manual";
    case Api = "api";
    case Stripe = "stripe";
}
