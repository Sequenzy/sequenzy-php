<?php

namespace Sequenzy\Transactional\Types;

enum ListTransactionalRequestSort: string
{
    case Date = "date";
    case Sends = "sends";
    case Opens = "opens";
    case OpenRate = "open-rate";
    case Clicks = "clicks";
    case Ctr = "ctr";
}
