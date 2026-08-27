<?php

namespace Sequenzy\Widgets\Types;

enum UpdateSavedFormRequestDuplicateStrategy: string
{
    case Skip = "skip";
    case Merge = "merge";
    case Overwrite = "overwrite";
}
