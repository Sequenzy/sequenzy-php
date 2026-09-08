<?php

namespace Sequenzy\Types;

enum FormCaptureSettingsAfterSubmission: string
{
    case Message = "message";
    case Redirect = "redirect";
}
