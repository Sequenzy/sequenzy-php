<?php

namespace Sequenzy\Types;

enum GalleryBrandRequestStatus: string
{
    case Requested = "requested";
    case Collecting = "collecting";
    case Available = "available";
    case Declined = "declined";
}
