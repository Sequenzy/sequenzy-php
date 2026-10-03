<?php

namespace Sequenzy\Push\Types;

enum ListPushDevicesRequestPlatform: string
{
    case Web = "web";
    case Ios = "ios";
    case Android = "android";
}
