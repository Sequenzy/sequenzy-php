<?php

namespace Sequenzy\Push\Types;

enum SendTestPushRequestPlatformsItem: string
{
    case Web = "web";
    case Ios = "ios";
    case Android = "android";
}
