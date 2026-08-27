<?php

namespace Sequenzy\Types;

enum EmailSendType: string
{
    case Campaign = "campaign";
    case Transactional = "transactional";
    case Sequence = "sequence";
}
