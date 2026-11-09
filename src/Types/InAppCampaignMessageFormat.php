<?php

namespace Sequenzy\Types;

enum InAppCampaignMessageFormat: string
{
    case Modal = "modal";
    case Banner = "banner";
    case Fullscreen = "fullscreen";
    case Html = "html";
}
