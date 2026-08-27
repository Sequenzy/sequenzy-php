<?php

namespace Sequenzy\Transactional\Types;

enum ListTransactionalRequestOrder: string
{
    case Asc = "asc";
    case Desc = "desc";
}
