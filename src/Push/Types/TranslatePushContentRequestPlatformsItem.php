<?php

namespace Sequenzy\Push\Types;

enum TranslatePushContentRequestPlatformsItem: string
{
    case Web = "web";
    case Ios = "ios";
    case Android = "android";
}
