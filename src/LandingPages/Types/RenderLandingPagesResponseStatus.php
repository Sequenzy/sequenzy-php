<?php

namespace Sequenzy\LandingPages\Types;

enum RenderLandingPagesResponseStatus: string
{
    case Draft = "draft";
    case Published = "published";
}
