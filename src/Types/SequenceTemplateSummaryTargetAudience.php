<?php

namespace Sequenzy\Types;

enum SequenceTemplateSummaryTargetAudience: string
{
    case Leads = "Leads";
    case Users = "Users";
    case Customers = "Customers";
    case Churned = "Churned";
}
