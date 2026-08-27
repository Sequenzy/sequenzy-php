<?php

namespace Sequenzy\Subscribers\Types;

enum CreateImportSubscribersRequestDuplicateStrategy: string
{
    case Skip = "skip";
    case Merge = "merge";
    case Overwrite = "overwrite";
}
