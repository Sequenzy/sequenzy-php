<?php

namespace Sequenzy\Types;

enum FormCaptureSettingsDuplicateStrategy: string
{
    case Skip = "skip";
    case Merge = "merge";
    case Overwrite = "overwrite";
}
