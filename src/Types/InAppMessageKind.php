<?php

namespace Sequenzy\Types;

enum InAppMessageKind: string
{
    case Message = "message";
    case Card = "card";
}
