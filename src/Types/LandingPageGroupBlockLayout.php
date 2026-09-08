<?php

namespace Sequenzy\Types;

enum LandingPageGroupBlockLayout: string
{
    case Stack = "stack";
    case Row = "row";
    case Grid = "grid";
    case Overlay = "overlay";
}
