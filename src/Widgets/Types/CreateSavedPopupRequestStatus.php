<?php

namespace Sequenzy\Widgets\Types;

enum CreateSavedPopupRequestStatus: string
{
    case Draft = "draft";
    case Published = "published";
}
