<?php

namespace Sequenzy\Companies\Types;

enum UpdateCompaniesRequestReplyTrackingDomainMode: string
{
    case Sequenzy = "sequenzy";
    case Custom = "custom";
}
