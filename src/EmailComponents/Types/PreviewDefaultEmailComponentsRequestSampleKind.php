<?php

namespace Sequenzy\EmailComponents\Types;

enum PreviewDefaultEmailComponentsRequestSampleKind: string
{
    case Email = "email";
    case AbVariant = "ab_variant";
    case Localization = "localization";
}
