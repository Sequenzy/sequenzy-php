<?php

namespace Sequenzy\Types;

enum EmailCheckIssueSeverity: string
{
    case Error = "error";
    case Warning = "warning";
    case Info = "info";
}
