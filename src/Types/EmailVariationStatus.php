<?php

namespace Sequenzy\Types;

enum EmailVariationStatus: string
{
    case Generating = "generating";
    case Ready = "ready";
    case Failed = "failed";
}
