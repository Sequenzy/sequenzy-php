<?php

namespace Sequenzy\Types;

enum RenderEmailResponseUnevaluatedConditionsItemReason: string
{
    case RequiresStoredSubscriber = "requires_stored_subscriber";
    case InvalidFilter = "invalid_filter";
    case EvaluationFailed = "evaluation_failed";
}
