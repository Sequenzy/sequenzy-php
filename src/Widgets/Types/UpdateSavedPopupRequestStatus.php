<?php

namespace Sequenzy\Widgets\Types;

enum UpdateSavedPopupRequestStatus: string
{
    case Draft = "draft";
    case Published = "published";
}
