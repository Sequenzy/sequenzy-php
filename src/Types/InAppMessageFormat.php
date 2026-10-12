<?php

namespace Sequenzy\Types;

enum InAppMessageFormat: string
{
    case Modal = "modal";
    case Banner = "banner";
    case Fullscreen = "fullscreen";
}
