<?php

namespace Sequenzy\Types;

enum BadRequestErrorBodyDetailsLimit: string
{
    case Depth = "depth";
    case Total = "total";
}
