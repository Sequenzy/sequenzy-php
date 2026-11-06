<?php

namespace Sequenzy\Companies\Types;

enum UpdateCompaniesRequestFooterThemeStyle: string
{
    case Auto = "auto";
    case Classic = "classic";
    case Mono = "mono";
    case Band = "band";
    case Editorial = "editorial";
    case Empty = "";
}
