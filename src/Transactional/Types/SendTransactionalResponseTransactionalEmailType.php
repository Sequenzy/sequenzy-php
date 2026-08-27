<?php

namespace Sequenzy\Transactional\Types;

enum SendTransactionalResponseTransactionalEmailType: string
{
    case Marketing = "marketing";
    case Transactional = "transactional";
}
