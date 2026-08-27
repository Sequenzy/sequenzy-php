<?php

namespace Sequenzy\Types;

enum SequenceDiscountInputProvider: string
{
    case Stripe = "stripe";
    case Shopify = "shopify";
}
