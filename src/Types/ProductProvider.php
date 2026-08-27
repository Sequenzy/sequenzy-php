<?php

namespace Sequenzy\Types;

enum ProductProvider: string
{
    case Api = "api";
    case Stripe = "stripe";
    case Shopify = "shopify";
    case Woocommerce = "woocommerce";
    case Manual = "manual";
}
