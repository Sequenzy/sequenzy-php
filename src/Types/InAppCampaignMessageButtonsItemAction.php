<?php

namespace Sequenzy\Types;

enum InAppCampaignMessageButtonsItemAction: string
{
    case OpenUrl = "open_url";
    case Dismiss = "dismiss";
    case RequestPushPermission = "request_push_permission";
}
