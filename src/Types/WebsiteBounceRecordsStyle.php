<?php

namespace Sequenzy\Types;

enum WebsiteBounceRecordsStyle: string
{
    case Cname = "cname";
    case MxTxt = "mx_txt";
}
