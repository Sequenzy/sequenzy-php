<?php

namespace Sequenzy\Types;

enum PushSettingsIosEnvironment: string
{
    case Production = "production";
    case Sandbox = "sandbox";
}
