<?php

namespace Sequenzy\EmailSends\Types;

enum ListEmailSendsRequestEmailType: string
{
    case Campaign = "campaign";
    case Transactional = "transactional";
    case Sequence = "sequence";
}
