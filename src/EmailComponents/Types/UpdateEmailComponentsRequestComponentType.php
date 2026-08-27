<?php

namespace Sequenzy\EmailComponents\Types;

enum UpdateEmailComponentsRequestComponentType: string
{
    case Section = "section";
    case Footer = "footer";
}
