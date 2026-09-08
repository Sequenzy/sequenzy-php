<?php

namespace Sequenzy\Types;

enum SavedFormSettingsTemplateId: string
{
    case Minimal = "minimal";
    case Inline = "inline";
    case Card = "card";
    case Compact = "compact";
    case EditorialSplit = "editorial-split";
    case FullPageWelcome = "full-page-welcome";
    case InlineBanner = "inline-banner";
    case FloatingBar = "floating-bar";
}
