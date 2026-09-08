<?php

namespace Sequenzy\Types;

enum FooterApplicationItemReason: string
{
    case Customized = "customized";
    case NoFooter = "no_footer";
    case AmbiguousFooter = "ambiguous_footer";
    case RawHtml = "raw_html";
    case Protected_ = "protected";
    case Shared = "shared";
}
