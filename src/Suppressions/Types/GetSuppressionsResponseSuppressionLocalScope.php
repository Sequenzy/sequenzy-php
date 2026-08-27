<?php

namespace Sequenzy\Suppressions\Types;

enum GetSuppressionsResponseSuppressionLocalScope: string
{
    case Global_ = "global";
    case Company = "company";
}
