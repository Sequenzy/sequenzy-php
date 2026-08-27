<?php

namespace Sequenzy\Types;

enum LandingPageContentThemeSectionAnimation: string
{
    case None = "none";
    case Fade = "fade";
    case SlideUp = "slide-up";
    case ZoomIn = "zoom-in";
}
