<?php

namespace Sequenzy\Widgets\Types;

enum UpdateSavedPopupRequestPresentation: string
{
    case Modal = "modal";
    case SlideIn = "slide-in";
    case FloatingBar = "floating-bar";
    case Fullscreen = "fullscreen";
}
