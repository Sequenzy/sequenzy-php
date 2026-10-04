<?php

namespace Sequenzy\Types;

enum GalleryWatchedBrandStatus: string
{
    case Requested = "requested";
    case Collecting = "collecting";
    case Available = "available";
    case Declined = "declined";
}
