<?php

namespace Sequenzy\References\Types;

enum ListEmailReferencesRequestScope: string
{
    case Similar = "similar";
    case All = "all";
}
