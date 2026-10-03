<?php

namespace Sequenzy\References\Types;

enum ListEmailReferencesResponseScope: string
{
    case Similar = "similar";
    case All = "all";
}
