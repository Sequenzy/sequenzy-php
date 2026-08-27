<?php

namespace Sequenzy\EmailComponents\Types;

enum ListEmailComponentsRequestType: string
{
    case Section = "section";
    case Footer = "footer";
}
