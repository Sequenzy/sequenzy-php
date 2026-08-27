<?php

namespace Sequenzy\Types;

enum CommerceProductProvider: string
{
    case Api = "api";
    case Stripe = "stripe";
    case Shopify = "shopify";
    case Woocommerce = "woocommerce";
    case Manual = "manual";
}
