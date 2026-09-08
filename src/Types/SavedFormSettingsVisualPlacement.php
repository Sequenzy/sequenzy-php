<?php

namespace Sequenzy\Types;

enum SavedFormSettingsVisualPlacement: string
{
    case None = "none";
    case Background = "background";
    case Left = "left";
    case Right = "right";
    case Top = "top";
}
