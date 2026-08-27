<?php

namespace Sequenzy\Types;

enum CompanyEmailLengthPreference: string
{
    case Concise = "concise";
    case Balanced = "balanced";
    case Detailed = "detailed";
}
