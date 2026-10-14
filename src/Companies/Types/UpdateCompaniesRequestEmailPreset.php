<?php

namespace Sequenzy\Companies\Types;

enum UpdateCompaniesRequestEmailPreset: string
{
    case Branded = "branded";
    case Minimal = "minimal";
}
