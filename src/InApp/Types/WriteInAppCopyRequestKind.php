<?php

namespace Sequenzy\InApp\Types;

enum WriteInAppCopyRequestKind: string
{
    case Message = "message";
    case Card = "card";
}
