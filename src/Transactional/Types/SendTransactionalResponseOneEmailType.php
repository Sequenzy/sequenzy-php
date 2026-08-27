<?php

namespace Sequenzy\Transactional\Types;

enum SendTransactionalResponseOneEmailType: string
{
    case Marketing = "marketing";
    case Transactional = "transactional";
}
