<?php

namespace Sequenzy\Types;

enum SavedPopupVisualStyle: string
{
    case None = "none";
    case Accent = "accent";
    case Header = "header";
    case Rail = "rail";
    case Image = "image";
    case Countdown = "countdown";
}
