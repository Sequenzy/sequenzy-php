<?php

namespace Sequenzy\Widgets\Types;

enum CreateSavedFormRequestDuplicateStrategy: string
{
    case Skip = "skip";
    case Merge = "merge";
    case Overwrite = "overwrite";
}
