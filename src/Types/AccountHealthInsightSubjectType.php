<?php

namespace Sequenzy\Types;

enum AccountHealthInsightSubjectType: string
{
    case Event = "event";
    case Automation = "automation";
    case Campaign = "campaign";
    case SendingDomain = "sending_domain";
    case Company = "company";
}
