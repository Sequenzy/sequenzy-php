<?php

namespace Sequenzy\Types;

enum EmailClientBreakdownClientsItemKey: string
{
    case AppleMail = "apple_mail";
    case Gmail = "gmail";
    case Outlook = "outlook";
    case YahooMail = "yahoo_mail";
    case Thunderbird = "thunderbird";
    case AndroidMailApp = "android_mail_app";
    case WebBrowser = "web_browser";
    case Other = "other";
}
