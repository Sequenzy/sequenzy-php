<?php

namespace Sequenzy\Widgets\Types;

enum CreateSavedPopupRequestDuplicateStrategy: string
{
    case Skip = "skip";
    case Merge = "merge";
    case Overwrite = "overwrite";
}
