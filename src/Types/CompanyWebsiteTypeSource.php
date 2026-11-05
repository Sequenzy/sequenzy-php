<?php

namespace Sequenzy\Types;

enum CompanyWebsiteTypeSource: string
{
    case User = "user";
    case Detected = "detected";
}
