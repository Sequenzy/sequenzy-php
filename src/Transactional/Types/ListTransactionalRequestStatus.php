<?php

namespace Sequenzy\Transactional\Types;

enum ListTransactionalRequestStatus: string
{
    case All = "all";
    case Active = "active";
    case Disabled = "disabled";
}
