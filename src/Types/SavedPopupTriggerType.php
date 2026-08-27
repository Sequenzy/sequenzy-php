<?php

namespace Sequenzy\Types;

enum SavedPopupTriggerType: string
{
    case Delay = "delay";
    case Scroll = "scroll";
    case ExitIntent = "exit-intent";
    case Click = "click";
    case Manual = "manual";
}
