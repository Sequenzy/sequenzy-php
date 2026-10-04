<?php

namespace Sequenzy\Types;

enum EmailCheckLinkFindingsItemSeverity: string
{
    case Error = "error";
    case Warning = "warning";
    case Info = "info";
}
