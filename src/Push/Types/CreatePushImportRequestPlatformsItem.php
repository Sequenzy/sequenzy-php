<?php

namespace Sequenzy\Push\Types;

enum CreatePushImportRequestPlatformsItem: string
{
    case Ios = "ios";
    case Android = "android";
}
