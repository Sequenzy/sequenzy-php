<?php

namespace Sequenzy\Types;

enum LandingPagePricingBlockSlot: string
{
    case Top = "top";
    case Hero = "hero";
    case Form = "form";
    case Body = "body";
    case Footer = "footer";
}
