<?php

namespace Sequenzy\Transactional\Types;

enum SendTransactionalResponseZeroEmailType: string
{
    case Marketing = "marketing";
    case Transactional = "transactional";
}
