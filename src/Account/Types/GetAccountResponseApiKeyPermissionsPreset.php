<?php

namespace Sequenzy\Account\Types;

enum GetAccountResponseApiKeyPermissionsPreset: string
{
    case FullAccess = "full_access";
    case ReadOnly = "read_only";
    case AgentSafe = "agent_safe";
    case AiDrafting = "ai_drafting";
    case DataIngestSafe = "data_ingest_safe";
    case DataIngestAutomations = "data_ingest_automations";
    case TransactionalSender = "transactional_sender";
    case MarketingSender = "marketing_sender";
    case Custom = "custom";
}
