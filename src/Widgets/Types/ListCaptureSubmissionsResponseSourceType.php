<?php

namespace Sequenzy\Widgets\Types;

enum ListCaptureSubmissionsResponseSourceType: string
{
    case Form = "form";
    case Popup = "popup";
    case LandingPage = "landing_page";
}
