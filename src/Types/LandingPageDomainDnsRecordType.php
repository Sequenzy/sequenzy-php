<?php

namespace Sequenzy\Types;

enum LandingPageDomainDnsRecordType: string
{
    case A = "A";
    case Cname = "CNAME";
}
