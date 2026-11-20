<?php

namespace Sequenzy\Companies\Types;

enum UpdateCompaniesRequestEmailThemeChromePack: string
{
    case Product = "product";
    case Editorial = "editorial";
    case Poster = "poster";
    case Storefront = "storefront";
}
