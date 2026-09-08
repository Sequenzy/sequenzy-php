<?php

namespace Sequenzy\Types;

enum SavedFormSettingsAfterSubmission: string
{
    case Message = "message";
    case Redirect = "redirect";
}
