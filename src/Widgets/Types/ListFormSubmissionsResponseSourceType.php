<?php

namespace Sequenzy\Widgets\Types;

enum ListFormSubmissionsResponseSourceType: string
{
    case Form = "form";
    case Popup = "popup";
    case LandingPage = "landing_page";
}
