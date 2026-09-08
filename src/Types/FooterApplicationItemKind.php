<?php

namespace Sequenzy\Types;

enum FooterApplicationItemKind: string
{
    case Email = "email";
    case AbVariant = "ab_variant";
    case Localization = "localization";
}
