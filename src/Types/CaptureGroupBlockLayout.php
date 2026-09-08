<?php

namespace Sequenzy\Types;

enum CaptureGroupBlockLayout: string
{
    case Stack = "stack";
    case Row = "row";
    case Grid = "grid";
    case Overlay = "overlay";
}
