<?php

namespace Sequenzy\Push\Types;

enum RegisterPushDeviceRequestPlatform: string
{
    case Ios = "ios";
    case Android = "android";
    case Web = "web";
}
