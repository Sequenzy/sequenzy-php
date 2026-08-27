<?php

namespace Sequenzy\Account\Types;

enum GetAccountResponseCompaniesItemRole: string
{
    case Owner = "owner";
    case Admin = "admin";
    case Viewer = "viewer";
}
