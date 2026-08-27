<?php

namespace Sequenzy\Types;

enum EmailSendEventEmailType: string
{
    case Campaign = "campaign";
    case Transactional = "transactional";
    case Sequence = "sequence";
}
