<?php

namespace Sequenzy\Types;

enum IntegrationProviderCapabilityConnectMethod: string
{
    case Oauth = "oauth";
    case ApiKey = "api_key";
    case AppInstall = "app_install";
    case Plugin = "plugin";
    case Webhook = "webhook";
}
