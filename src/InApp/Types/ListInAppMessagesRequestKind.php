<?php

namespace Sequenzy\InApp\Types;

enum ListInAppMessagesRequestKind: string
{
    case Message = "message";
    case Card = "card";
}
