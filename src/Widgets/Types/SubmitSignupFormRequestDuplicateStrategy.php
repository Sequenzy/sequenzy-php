<?php

namespace Sequenzy\Widgets\Types;

enum SubmitSignupFormRequestDuplicateStrategy: string
{
    case Skip = "skip";
    case Merge = "merge";
    case Overwrite = "overwrite";
}
