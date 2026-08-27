<?php

namespace Sequenzy\Types;

enum EmailEventEmailType: string
{
    case Campaign = "campaign";
    case Sequence = "sequence";
    case Transactional = "transactional";
}
