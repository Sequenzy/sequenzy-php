<?php

namespace Sequenzy\EmailSends\Types;

enum ListEmailSendsRequestBounceType: string
{
    case Permanent = "Permanent";
    case Transient = "Transient";
    case Soft = "Soft";
    case Blocked = "Blocked";
}
