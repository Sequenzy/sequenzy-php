<?php

namespace Sequenzy\InApp\Types;

enum RecordInAppEventRequestType: string
{
    case Displayed = "displayed";
    case Clicked = "clicked";
    case Dismissed = "dismissed";
    case Read = "read";
}
