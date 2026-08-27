<?php

namespace Sequenzy\Transactional\Types;

enum SendTransactionalRequestEmailType: string
{
    case Transactional = "transactional";
    case Marketing = "marketing";
}
