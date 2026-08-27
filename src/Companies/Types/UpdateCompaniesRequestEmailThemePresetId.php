<?php

namespace Sequenzy\Companies\Types;

enum UpdateCompaniesRequestEmailThemePresetId: string
{
    case Default_ = "default";
    case Soft = "soft";
    case Editorial = "editorial";
    case Bold = "bold";
}
