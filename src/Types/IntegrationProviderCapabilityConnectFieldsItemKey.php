<?php

namespace Sequenzy\Types;

enum IntegrationProviderCapabilityConnectFieldsItemKey: string
{
    case ApiKey = "apiKey";
    case WebhookSecret = "webhookSecret";
    case ProviderAccountId = "providerAccountId";
    case Settings = "settings";
    case HistoryImport = "historyImport";
}
