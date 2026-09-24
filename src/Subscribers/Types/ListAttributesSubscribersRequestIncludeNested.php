<?php

namespace Sequenzy\Subscribers\Types;

enum ListAttributesSubscribersRequestIncludeNested: string
{
    case True = "true";
    case False = "false";
}
