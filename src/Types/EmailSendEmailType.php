<?php

namespace Sequenzy\Types;

enum EmailSendEmailType: string
{
    case Marketing = "marketing";
    case Transactional = "transactional";
}
