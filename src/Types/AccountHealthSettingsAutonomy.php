<?php

namespace Sequenzy\Types;

enum AccountHealthSettingsAutonomy: string
{
    case DraftFixes = "draft_fixes";
    case ReportOnly = "report_only";
}
