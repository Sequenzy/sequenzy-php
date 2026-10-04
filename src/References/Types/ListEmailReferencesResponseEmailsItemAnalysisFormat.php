<?php

namespace Sequenzy\References\Types;

enum ListEmailReferencesResponseEmailsItemAnalysisFormat: string
{
    case Plain = "plain";
    case TextHeavy = "text_heavy";
    case Balanced = "balanced";
    case Visual = "visual";
}
