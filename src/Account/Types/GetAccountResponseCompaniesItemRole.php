<?php

namespace Sequenzy\Account\Types;

enum GetAccountResponseCompaniesItemRole: string
{
    case Owner = "owner";
    case Admin = "admin";
    case Marketer = "marketer";
    case Viewer = "viewer";
}
