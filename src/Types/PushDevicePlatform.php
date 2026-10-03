<?php

namespace Sequenzy\Types;

enum PushDevicePlatform: string
{
    case Web = "web";
    case Ios = "ios";
    case Android = "android";
}
