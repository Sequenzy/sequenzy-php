<?php

namespace Sequenzy\Types;

enum SavedFormSettingsDuplicateStrategy: string
{
    case Skip = "skip";
    case Merge = "merge";
    case Overwrite = "overwrite";
}
