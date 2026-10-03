<?php

namespace Sequenzy\Types;

enum TransactionalSendIgnoredHeadersItemReason: string
{
    case InvalidHeaders = "invalid_headers";
    case InvalidName = "invalid_name";
    case InvalidValue = "invalid_value";
    case Duplicate = "duplicate";
    case Reserved = "reserved";
    case ManagedInMarketingMode = "managed_in_marketing_mode";
    case RequiresListUnsubscribe = "requires_list_unsubscribe";
    case TooManyHeaders = "too_many_headers";
}
