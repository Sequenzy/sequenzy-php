<?php

namespace Sequenzy\Types;

enum EmailBlockLayout: string
{
    case Stack = "stack";
    case Row = "row";
    case Grid = "grid";
    case Overlay = "overlay";
}
