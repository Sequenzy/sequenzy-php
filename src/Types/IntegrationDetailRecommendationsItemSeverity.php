<?php

namespace Sequenzy\Types;

enum IntegrationDetailRecommendationsItemSeverity: string
{
    case Error = "error";
    case Warning = "warning";
    case Info = "info";
}
