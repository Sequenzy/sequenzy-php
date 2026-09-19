<?php

namespace Sequenzy\Widgets\Types;

enum ListCaptureSubmissionsResponseSubmissionsItemSourceType: string
{
    case Form = "form";
    case Popup = "popup";
    case LandingPage = "landing_page";
}
