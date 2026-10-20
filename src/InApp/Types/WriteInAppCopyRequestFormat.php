<?php

namespace Sequenzy\InApp\Types;

enum WriteInAppCopyRequestFormat: string
{
    case Modal = "modal";
    case Banner = "banner";
    case Fullscreen = "fullscreen";
}
