<?php

namespace Sequenzy\EmailComponents\Types;

enum CreateEmailComponentsRequestComponentType: string
{
    case Section = "section";
    case Footer = "footer";
}
