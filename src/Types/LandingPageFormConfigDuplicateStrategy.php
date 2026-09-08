<?php

namespace Sequenzy\Types;

enum LandingPageFormConfigDuplicateStrategy: string
{
    case Skip = "skip";
    case Merge = "merge";
    case Overwrite = "overwrite";
}
