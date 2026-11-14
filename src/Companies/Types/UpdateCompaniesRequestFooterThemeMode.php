<?php

namespace Sequenzy\Companies\Types;

enum UpdateCompaniesRequestFooterThemeMode: string
{
    case Branded = "branded";
    case Personal = "personal";
    case Empty = "";
}
