<?php

namespace Sequenzy\Products\Types;

enum ListProductsRequestProvider: string
{
    case Api = "api";
    case Stripe = "stripe";
    case Shopify = "shopify";
    case Woocommerce = "woocommerce";
    case Manual = "manual";
}
