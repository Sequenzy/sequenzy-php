<?php

namespace Sequenzy\Types;

enum SequenceStepInputProvider: string
{
    case Stripe = "stripe";
    case Shopify = "shopify";
}
