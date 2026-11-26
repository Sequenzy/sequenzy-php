<?php

namespace Sequenzy\Companies\Types;

enum UpdateCompaniesRequestEmailThemeBackgroundImageTarget: string
{
    case Both = "both";
    case Content = "content";
    case Canvas = "canvas";
}
