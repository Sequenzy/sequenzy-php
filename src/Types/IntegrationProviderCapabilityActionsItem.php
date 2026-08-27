<?php

namespace Sequenzy\Types;

enum IntegrationProviderCapabilityActionsItem: string
{
    case Connect = "connect";
    case EnableSync = "enable_sync";
    case DisableSync = "disable_sync";
    case SyncNow = "sync_now";
    case SyncProducts = "sync_products";
    case SetListTargeting = "set_list_targeting";
    case ActivatePixel = "activate_pixel";
}
