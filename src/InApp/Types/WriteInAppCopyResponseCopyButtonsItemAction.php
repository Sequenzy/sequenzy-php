<?php

namespace Sequenzy\InApp\Types;

enum WriteInAppCopyResponseCopyButtonsItemAction: string
{
    case OpenUrl = "open_url";
    case Dismiss = "dismiss";
    case RequestPushPermission = "request_push_permission";
}
