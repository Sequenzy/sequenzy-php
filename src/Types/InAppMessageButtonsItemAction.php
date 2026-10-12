<?php

namespace Sequenzy\Types;

enum InAppMessageButtonsItemAction: string
{
    case OpenUrl = "open_url";
    case Dismiss = "dismiss";
}
