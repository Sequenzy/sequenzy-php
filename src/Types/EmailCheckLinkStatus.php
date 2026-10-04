<?php

namespace Sequenzy\Types;

enum EmailCheckLinkStatus: string
{
    case Ok = "ok";
    case Broken = "broken";
    case Invalid = "invalid";
    case ServerError = "server_error";
    case Unreachable = "unreachable";
    case Restricted = "restricted";
    case Personalized = "personalized";
    case NotChecked = "not_checked";
}
