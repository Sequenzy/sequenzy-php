<?php

namespace Sequenzy\Sequences\Types;

enum ListTemplatesSequencesRequestWebsiteType: string
{
    case Company = "company";
    case All = "all";
    case Saas = "saas";
    case Content = "content";
    case Ecommerce = "ecommerce";
    case Offline = "offline";
    case MobileApp = "mobile_app";
    case Other = "other";
}
