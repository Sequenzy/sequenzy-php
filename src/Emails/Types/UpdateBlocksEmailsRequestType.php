<?php

namespace Sequenzy\Emails\Types;

enum UpdateBlocksEmailsRequestType: string
{
    case Text = "text";
    case Html = "html";
}
