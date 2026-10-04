<?php

namespace Sequenzy\Types;

enum GalleryEmailAnalysisFormat: string
{
    case Plain = "plain";
    case TextHeavy = "text_heavy";
    case Balanced = "balanced";
    case Visual = "visual";
}
