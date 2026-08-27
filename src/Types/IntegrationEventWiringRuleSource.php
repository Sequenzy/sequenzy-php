<?php

namespace Sequenzy\Types;

enum IntegrationEventWiringRuleSource: string
{
    case Custom = "custom";
    case Default_ = "default";
    case None = "none";
}
