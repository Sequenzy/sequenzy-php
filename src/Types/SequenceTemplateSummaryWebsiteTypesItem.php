<?php

namespace Sequenzy\Types;

enum SequenceTemplateSummaryWebsiteTypesItem: string
{
    case Saas = "saas";
    case Content = "content";
    case Ecommerce = "ecommerce";
    case Offline = "offline";
    case MobileApp = "mobile_app";
    case Other = "other";
}
