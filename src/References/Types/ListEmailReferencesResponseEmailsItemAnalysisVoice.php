<?php

namespace Sequenzy\References\Types;

enum ListEmailReferencesResponseEmailsItemAnalysisVoice: string
{
    case Friendly = "friendly";
    case Professional = "professional";
    case Playful = "playful";
    case Urgent = "urgent";
    case Inspirational = "inspirational";
    case Informative = "informative";
    case Personal = "personal";
}
