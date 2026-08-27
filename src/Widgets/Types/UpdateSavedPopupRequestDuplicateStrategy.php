<?php

namespace Sequenzy\Widgets\Types;

enum UpdateSavedPopupRequestDuplicateStrategy: string
{
    case Skip = "skip";
    case Merge = "merge";
    case Overwrite = "overwrite";
}
