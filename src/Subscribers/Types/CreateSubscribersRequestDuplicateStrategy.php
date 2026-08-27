<?php

namespace Sequenzy\Subscribers\Types;

enum CreateSubscribersRequestDuplicateStrategy: string
{
    case Skip = "skip";
    case Merge = "merge";
    case Overwrite = "overwrite";
}
