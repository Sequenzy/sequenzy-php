<?php

namespace Sequenzy\Widgets\Types;

enum SubmitCompanyScopedSavedSignupFormRequestDuplicateStrategy: string
{
    case Skip = "skip";
    case Merge = "merge";
    case Overwrite = "overwrite";
}
