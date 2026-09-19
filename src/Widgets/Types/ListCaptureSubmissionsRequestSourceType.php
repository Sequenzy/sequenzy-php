<?php

namespace Sequenzy\Widgets\Types;

enum ListCaptureSubmissionsRequestSourceType: string
{
    case Form = "form";
    case Popup = "popup";
    case LandingPage = "landing_page";
}
