<?php

namespace Sequenzy\Lists\Types;

enum AddSubscribersListsRequestDuplicateStrategy: string
{
    case Skip = "skip";
    case Merge = "merge";
    case Overwrite = "overwrite";
}
