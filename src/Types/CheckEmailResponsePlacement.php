<?php

namespace Sequenzy\Types;

enum CheckEmailResponsePlacement: string
{
    case Primary = "Primary";
    case Promotions = "Promotions";
    case Spam = "Spam";
}
