<?php

namespace Sequenzy\Companies\Types;

enum UpdateCompaniesRequestEmailLengthPreference: string
{
    case Concise = "concise";
    case Balanced = "balanced";
    case Detailed = "detailed";
}
